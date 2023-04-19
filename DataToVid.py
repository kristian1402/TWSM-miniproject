import numpy as np
import cv2
import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt

# Read CSV file with delimiter ';'
# Read CSV file with delimiter ';'
data = pd.read_csv('test2.csv', sep=";", header=0)
#print(data.head(10))
#print(data[' Y'])

pivot = data.pivot(index='X', columns=' Y', values=' Z')
ax = sns.heatmap(pivot, annot=True)
plt.show()
