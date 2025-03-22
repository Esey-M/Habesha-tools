#!/usr/bin/env python3
import sys
from rembg import remove
from PIL import Image
import io

def remove_background(input_path, output_path):
    # Read the input image
    input_image = Image.open(input_path)
    
    # Remove the background
    output_image = remove(input_image)
    
    # Save the result
    output_image.save(output_path, 'PNG')

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python remove_background.py input_image output_image")
        sys.exit(1)
    
    input_path = sys.argv[1]
    output_path = sys.argv[2]
    
    try:
        remove_background(input_path, output_path)
        print("Background removed successfully!")
    except Exception as e:
        print(f"Error: {str(e)}")
        sys.exit(1) 