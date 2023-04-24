import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt
import numpy as np
import os

script_dir = os.path.dirname(os.path.abspath(__file__))

folder_path = 'tmpFiles'
# Get a list of all file names in the directory
file_list = os.listdir(folder_path)
# Iterate over each file and delete old images, to ensure previously generated images won't interfere
for file_name in file_list:
    os.remove(os.path.join(folder_path, file_name))

class ImageMaker():

    i = 1

    df = pd.read_csv('TesterCleaned.csv', sep=";", header=0)

    # Get the min and max values for X and Z from the entire dataset
    x_min = df['X'].min()
    x_max = df['X'].max()
    z_min = df['Z'].min()
    z_max = df['Z'].max()

    # Define the size of the figure in inches
    fig_size = (8, 6)

    for f in range(10, len(df)+1, 10):
        print(f)

        # Slice the dataframe up until the current iteration
        df_slice = df.iloc[:f, :]

        # Pivot the data using the pivot_table method and sum the counts of duplicates
        pivot = df_slice.pivot_table(index='Z', columns='X', values='Count', aggfunc='sum')

        # Calculate the maximum value of the pivot table for the entire dataframe
        max_value = np.nanmax(pivot.values)

        # Create a new figure and plot the heatmap
        fig, ax = plt.subplots(figsize=fig_size)
        sns.heatmap(pivot, annot=False, cmap='YlOrRd', cbar=False, vmin=0, vmax=max_value, ax=ax)

        # Add points to the corners of the plot
        ax.plot([x_min, x_min], [z_min, z_min], marker='o', color='black')
        ax.plot([x_max, x_max], [z_min, z_min], marker='o', color='black')
        ax.plot([x_min, x_min], [z_max, z_max], marker='o', color='black')
        ax.plot([x_max, x_max], [z_max, z_max], marker='o', color='black')

        # Save the plot to a file in the tmpFiles directory
        save_at = os.path.join(script_dir, 'tmpFiles', str(i) + '.png')
        plt.savefig(save_at, dpi=300, bbox_inches='tight')

        # Close the figure to prevent memory issues
        plt.close(fig)

        # Increment the counter
        i += 1
