#!/usr/bin/env python3
import sys
import os
import cv2
import numpy as np
from PIL import Image

def calculate_adaptive_margin(image_size):
    """Calculate margin based on image size"""
    return max(5, min(20, int(min(image_size) * 0.02)))

def refine_edges(image, mask, iterations=2):
    """Refine edges using morphological operations and edge detection"""
    # Convert to grayscale for edge detection
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    
    # Apply Canny edge detection
    edges = cv2.Canny(gray, 100, 200)
    
    # Create a refined mask
    refined_mask = mask.copy()
    
    # Dilate the mask slightly
    kernel = np.ones((3,3), np.uint8)
    refined_mask = cv2.dilate(refined_mask, kernel, iterations=1)
    
    # Combine with edges
    refined_mask = cv2.bitwise_or(refined_mask, edges)
    
    # Apply morphological operations
    for _ in range(iterations):
        refined_mask = cv2.morphologyEx(refined_mask, cv2.MORPH_CLOSE, kernel)
        refined_mask = cv2.morphologyEx(refined_mask, cv2.MORPH_OPEN, kernel)
    
    return refined_mask

def remove_background(input_path, output_path):
    try:
        # Read the image
        image = cv2.imread(input_path)
        if image is None:
            raise ValueError("Could not read the image")

        # Convert to RGB if needed
        if len(image.shape) == 2:
            image = cv2.cvtColor(image, cv2.COLOR_GRAY2BGR)
        
        # Create a mask with the same size as the image
        mask = np.zeros(image.shape[:2], np.uint8)
        
        # Create temporary arrays for the GrabCut algorithm
        bgdModel = np.zeros((1,65), np.float64)
        fgdModel = np.zeros((1,65), np.float64)
        
        # Calculate adaptive margin
        height, width = image.shape[:2]
        margin = calculate_adaptive_margin((width, height))
        rect = (margin, margin, width-margin*2, height-margin*2)
        
        # Apply GrabCut with multiple iterations for better results
        cv2.grabCut(image, mask, rect, bgdModel, fgdModel, 5, cv2.GC_INIT_WITH_RECT)
        
        # Create a mask where 0 and 2 are background, 1 and 3 are foreground
        mask2 = np.where((mask==2)|(mask==0), 0, 1).astype('uint8')
        
        # Refine edges
        refined_mask = refine_edges(image, mask2)
        
        # Apply the refined mask to get the foreground
        foreground = image * refined_mask[:, :, np.newaxis]
        
        # Convert to RGBA
        b, g, r = cv2.split(foreground)
        alpha = refined_mask * 255
        
        # Apply Gaussian blur to alpha channel for smoother edges
        alpha = cv2.GaussianBlur(alpha, (5,5), 0)
        
        # Combine channels
        rgba = [b, g, r, alpha]
        dst = cv2.merge(rgba, 4)
        
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