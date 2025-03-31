#!/usr/bin/env python3
import sys
import os
from rembg import remove
from PIL import Image
import logging

# Set up logging
logging.basicConfig(level=logging.INFO)
logger = logging.getLogger(__name__)

def remove_background(input_path, output_path):
    try:
        logger.info(f"Opening image: {input_path}")
        input_image = Image.open(input_path)
        
        logger.info("Removing background...")
        output_image = remove(input_image)
        
        logger.info(f"Saving result to: {output_path}")
        output_image.save(output_path, 'PNG')
        
        logger.info("Successfully processed image")
        return True
    except Exception as e:
        logger.error(f"Error processing image: {str(e)}")
        return False

if __name__ == "__main__":
    if len(sys.argv) != 3:
        logger.error("Usage: python remove_background.py <input_image_path> <output_image_path>")
        sys.exit(1)
    
    input_path = sys.argv[1]
    output_path = sys.argv[2]
    
    if not os.path.exists(input_path):
        logger.error(f"Input file does not exist: {input_path}")
        sys.exit(1)
    
    # Ensure the output directory exists
    output_dir = os.path.dirname(output_path)
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)
    
    success = remove_background(input_path, output_path)
    sys.exit(0 if success else 1) 