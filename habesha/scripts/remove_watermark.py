#!/usr/bin/env python3
import sys
import json
import cv2
import numpy as np
from PIL import Image

def create_mask(image, coordinates, expand=5):
    """Create a mask from coordinates with optional expansion"""
    mask = np.zeros(image.shape[:2], dtype=np.uint8)
    points = np.array([[int(c['x']), int(c['y'])] for c in coordinates])
    cv2.fillPoly(mask, [points], 255)
    
    # Expand the mask slightly to ensure complete coverage
    if expand > 0:
        kernel = np.ones((expand, expand), np.uint8)
        mask = cv2.dilate(mask, kernel, iterations=1)
    
    return mask

def remove_watermark(input_path, output_path, coordinates, method='advanced'):
    try:
        # Read the input image
        image = cv2.imread(input_path)
        if image is None:
            raise ValueError("Could not read input image")

        # Convert to RGB for better processing
        image = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
        
        # Create the initial mask
        mask = create_mask(image, coordinates)
        
        if method == 'advanced':
            # Advanced watermark removal using multiple techniques
            
            # 1. Initial inpainting with a larger radius
            radius = 5
            result = cv2.inpaint(image, mask, radius, cv2.INPAINT_TELEA)
            
            # 2. Apply frequency domain filtering
            # Convert to grayscale for DFT
            gray = cv2.cvtColor(result, cv2.COLOR_RGB2GRAY)
            f_transform = cv2.dft(np.float32(gray), flags=cv2.DFT_COMPLEX_OUTPUT)
            f_shift = np.fft.fftshift(f_transform)
            
            # Create a high-pass filter
            rows, cols = gray.shape
            crow, ccol = rows//2, cols//2
            mask_hp = np.ones((rows, cols, 2), np.float32)
            r = 30  # radius of the high-pass filter
            center = [crow, ccol]
            x, y = np.ogrid[:rows, :cols]
            mask_area = (x - center[0])**2 + (y - center[1])**2 <= r*r
            mask_hp[mask_area] = 0
            
            # Apply the filter
            f_shift_filtered = f_shift * mask_hp
            f_ishift = np.fft.ifftshift(f_shift_filtered)
            img_back = cv2.idft(f_ishift)
            img_back = cv2.magnitude(img_back[:,:,0], img_back[:,:,1])
            
            # Normalize and convert back to uint8
            img_back = cv2.normalize(img_back, None, 0, 255, cv2.NORM_MINMAX).astype(np.uint8)
            
            # Convert back to RGB
            img_back = cv2.cvtColor(img_back, cv2.COLOR_GRAY2RGB)
            
            # 3. Final inpainting with a smaller radius for detail preservation
            radius = 3
            result = cv2.inpaint(img_back, mask, radius, cv2.INPAINT_TELEA)
            
            # 4. Apply color correction to match surrounding areas
            mask_3d = cv2.cvtColor(mask, cv2.COLOR_GRAY2RGB)
            surrounding = cv2.bitwise_and(image, cv2.bitwise_not(mask_3d))
            result = cv2.addWeighted(result, 1, surrounding, 0.1, 0)
            
        else:
            # Simple inpainting method
            radius = 3
            result = cv2.inpaint(image, mask, radius, cv2.INPAINT_TELEA)
        
        # Convert back to BGR for saving
        result = cv2.cvtColor(result, cv2.COLOR_RGB2BGR)
        
        # Save the result
        cv2.imwrite(output_path, result)
        print("Watermark removed successfully!")
        
    except Exception as e:
        print(f"Error: {str(e)}", file=sys.stderr)
        sys.exit(1)

if __name__ == "__main__":
    if len(sys.argv) != 4:
        print("Usage: python remove_watermark.py input_image output_image coordinates_json")
        sys.exit(1)
    
    input_path = sys.argv[1]
    output_path = sys.argv[2]
    coordinates_json = sys.argv[3]
    
    try:
        coordinates = json.loads(coordinates_json)
        remove_watermark(input_path, output_path, coordinates)
    except Exception as e:
        print(f"Error: {str(e)}", file=sys.stderr)
        sys.exit(1) 