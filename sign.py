import os
from PIL import Image
import sys

def find_files(filename, search_path):
   result1=''
   for root, dirs, files in os.walk(search_path):
      if filename in files:
         result1=os.path.join(root, filename)
         im=Image.open(result1)
         im.show()

value_from_php = sys.argv[1]
find_files(value_from_php, "braille")
