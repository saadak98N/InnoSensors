# -*- coding: utf-8 -*-
"""
Created on Sat May 11 16:43:30 2019

@author: Sohaib
"""
import sys
from PIL import Image
import numpy as np
import scipy.misc

def load_image( infilename ) :
    img = Image.open( infilename )
    img.load()
    data = np.array( img)
    return data

print(sys.argv)

imgdata = load_image(sys.argv[1])

#Extracting ndvi
ndvi1 = 1.236*imgdata[:,:, 2] - 0.188*imgdata[:,:, 0]
ndvi2 = 1.000*imgdata[:,:, 2] + 0.044*imgdata[:,:, 0]
ndvi = ndvi1/ndvi2
#print(ndvi.shape)

#removing negative values
ndviF=ndvi
for x in range(ndviF.shape[0]):
  for y in range(ndviF.shape[1]):
    if (ndviF[x,y]<0):
      ndviF[x,y] = 0
    #if (ndvi[x,y]<-1):
    #  ndvi[x,y] = -1
    
    
##DN = (127 * ndvi) + 128

##scipy.misc.imsave('NDVIgray.jpg', DN)
    
#For colored image    
imgColor = np.zeros((ndvi.shape[0],ndvi.shape[1],3))
for x in range(ndvi.shape[0]):
  for y in range(ndvi.shape[1]):
    if (ndvi[x,y]<0.5):
      imgColor[x,y]=[255,255*ndvi[x,y]*2,0]
    else:
      imgColor[x,y]=[255*(2-ndvi[x,y]*2),255,0]
      
      
scipy.misc.imsave(sys.argv[1].split('.')[0]+'NDVI.jpg', imgColor)

print("Successful")