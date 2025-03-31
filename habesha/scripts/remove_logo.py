#!/usr/bin/env python3
import sys
import os
import json
import cv2
import numpy as np
import logging

# Set up logging
logging.basicConfig(level=logging.INFO)
logger = logging.getLogger(__name__)

def remove_logo(input_path, output_path, coordinates_json):
    try:
        logger.info(f"Opening image: {input_path}")
        image = cv2.imread(input_path)
        if image is None:
            raise Exception("Failed to read input image")

        # Parse coordinates from JSON
        logger.info("Parsing coordinates")
        coordinates = json.loads(coordinates_json)
        logger.info(f"Received coordinates: {coordinates}")
        
        # Create a mask for the logo area
        mask = np.zeros(image.shape[:2], dtype=np.uint8)
        
        # Convert coordinates to numpy array for polygon
        points = []
        for coord in coordinates:
            x = int(float(coord['x']))
            y = int(float(coord['y']))
            points.append([x, y])
        
        points = np.array(points, np.int32)
        points = points.reshape((-1, 1, 2))
        
        # Draw the polygon on the mask
        cv2.fillPoly(mask, [points], (255))
        
        # Dilate the mask to ensure complete coverage
        kernel = np.ones((7,7), np.uint8)
        mask = cv2.dilate(mask, kernel, iterations=2)
        
        # Create a larger mask for better context
        expanded_mask = cv2.dilate(mask, kernel, iterations=3)
        expanded_mask = cv2.GaussianBlur(expanded_mask, (21, 21), 0)
        
        # Apply inpainting with larger radius for better blending
        logger.info("Applying inpainting")
        radius = 10  # Increased radius for better blending
        result = cv2.inpaint(image, mask, radius, cv2.INPAINT_NS)  # Using NS method for better results
        
        # Blend the edges
        alpha = expanded_mask.astype(float) / 255
        alpha = np.stack([alpha] * 3, axis=-1)
        blended = (1 - alpha) * image + alpha * result
        
        # Convert back to uint8
        final_result = blended.astype(np.uint8)
        
        # Save the result
        logger.info(f"Saving result to: {output_path}")
        cv2.imwrite(output_path, final_result)
        
        logger.info("Successfully processed image")
        return True
    except Exception as e:
        logger.error(f"Error processing image: {str(e)}")
        return False

if __name__ == "__main__":
    if len(sys.argv) != 4:
        logger.error("Usage: python remove_logo.py <input_image_path> <output_image_path> <coordinates_json>")
        sys.exit(1)
    
    input_path = sys.argv[1]
    output_path = sys.argv[2]
    coordinates_json = sys.argv[3]
    
    if not os.path.exists(input_path):
        logger.error(f"Input file does not exist: {input_path}")
        sys.exit(1)
    
    # Ensure the output directory exists
    output_dir = os.path.dirname(output_path)
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)
    
    success = remove_logo(input_path, output_path, coordinates_json)
    sys.exit(0 if success else 1) 