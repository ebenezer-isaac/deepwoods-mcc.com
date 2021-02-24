import os
from PIL import Image

files = [f for f in os.listdir('.') if os.path.isfile(f)]
counter = 1
for file in files:
	image = Image.open(file)
	width, height = image.size
	ratio = float(width)/float(height)
	new_image = image.resize((1080, int(1080/ratio)))
	new_image.save(file)
	print(file, (image.size), (new_image.size))