#!/usr/bin/env python3
import sys
import os
import cv2
import numpy as np
from PIL import Image

def remove_background(input_path, output_path):
    try:
        # Read the image
        image = cv2.imread(input_path)
        if image is None:
            raise ValueError("Could not read the image")

        # Create a mask with the same size as the image
        mask = np.zeros(image.shape[:2], np.uint8)
        
        # Create temporary arrays for the GrabCut algorithm
        bgdModel = np.zeros((1,65), np.float64)
        fgdModel = np.zeros((1,65), np.float64)
        
        # Define the rectangle that contains the object
        height, width = image.shape[:2]
        margin = 10  # pixels from the edge
        rect = (margin, margin, width-margin*2, height-margin*2)
        
        # Apply GrabCut with multiple iterations for better results
        cv2.grabCut(image, mask, rect, bgdModel, fgdModel, 10, cv2.GC_INIT_WITH_RECT)
        
        # Create a mask where 0 and 2 are background, 1 and 3 are foreground
        mask2 = np.where((mask==2)|(mask==0), 0, 1).astype('uint8')
        
        # Apply the mask to get the foreground
        foreground = image * mask2[:, :, np.newaxis]
        
        # Convert to RGBA
        b, g, r = cv2.split(foreground)
        alpha = mask2 * 255
        rgba = [b, g, r, alpha]
        dst = cv2.merge(rgba, 4)
        
        # Apply edge refinement
        kernel = np.ones((3,3), np.uint8)
        alpha = cv2.erode(alpha, kernel, iterations=1)
        alpha = cv2.GaussianBlur(alpha, (5,5), 0)
        dst[:, :, 3] = alpha
        
        # Save the result
        cv2.imwrite(output_path, dst)
        print(f"Background removed successfully. Output saved to: {output_path}")
        
    except Exception as e:
        print(f"Error: {str(e)}", file=sys.stderr)
        sys.exit(1)

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python remove_background.py <input_path> <output_path>", file=sys.stderr)
        sys.exit(1)
    
    input_path = sys.argv[1]
    output_path = sys.argv[2]
    remove_background(input_path, output_path) 