#!/usr/bin/env python3
import sys
import json
import cv2
import numpy as np

def remove_logo(input_path, output_path, coordinates):
    # Read the input image
    image = cv2.imread(input_path)
    if image is None:
        raise ValueError("Could not read input image")

    # Create a mask from the coordinates
    mask = np.zeros(image.shape[:2], dtype=np.uint8)
    points = np.array([[int(c['x']), int(c['y'])] for c in coordinates])
    cv2.fillPoly(mask, [points], 255)

    # Inpaint the selected region
    radius = 3  # Radius of a circular neighborhood of each point
    result = cv2.inpaint(image, mask, radius, cv2.INPAINT_TELEA)

    # Save the result
    cv2.imwrite(output_path, result)
    print("Logo removed successfully!")

if __name__ == "__main__":
    if len(sys.argv) != 4:
        print("Usage: python remove_logo.py input_image output_image coordinates_json")
        sys.exit(1)
    
    input_path = sys.argv[1]
    output_path = sys.argv[2]
    coordinates_json = sys.argv[3]
    
    try:
        coordinates = json.loads(coordinates_json)
        remove_logo(input_path, output_path, coordinates)
    except Exception as e:
        print(f"Error: {str(e)}")
        sys.exit(1) 