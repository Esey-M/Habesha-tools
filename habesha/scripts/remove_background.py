#!/usr/bin/env python3
import sys
import os
from rembg import remove
from PIL import Image

def remove_background(input_path, output_path):
    try:
        # Read the input image
        input_image = Image.open(input_path)
        
        # Remove the background
        output_image = remove(input_image)
        
        # Save the result
        output_image.save(output_path, 'PNG')
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