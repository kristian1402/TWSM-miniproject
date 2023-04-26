# TWSM miniproject
 
----Set up XAMPP----
- Download XAMPP
- Locate the install directory of XAMPP. Default location is usually C:\xampp
- Put project folder inside the den folder
- Start up XAMPP Control Panel
- Click 'Start' on both Apache and MySQL
-----------------------------

----Set up a database----
- When Apache and MySQL are running, open your web browser and navigate to http://localhost/phpmyadmin/.
- Create a new database called “csvfiles”
- In the csvfiles database click on the "Import" tab.
- Click on the "Choose File" button and select the included CSV files from the folder, all named in time string format.
- Choose the appropriate options for the import settings, such as setting the delimiter as “;” and no collum encapsulation or ending.
- Click the "Go" button to start the import process.
- Wait for the import process to complete. Depending on the size of the CSV file and the speed of your computer, this process may take some time.
- Once the import process is complete, you should see a message indicating that the import was successful.
----------------------------------

----Ensure that php can run Python scripts----
- Make sure to have downloaded Python.
- Included in this repo is a .txt file called “Requirements.txt”, which contains the required Python packages for running the script. Some IDEs like PyCharm can read this file and install the packages automatically, otherwise they can be installed manually to your Python environment using pip install. 
- The script “runPythonScript.php” contains a variable on line 2 entitled “$pythonPath”. This variable needs to be changed to the path to your local Python environment with the required packages installed.
-----------------------------------

----Navigating website----
- When all these requirements are met, the website should be able to run. Navigate to http://localhost/TWSM-miniproject/html/main.html to enter the main page. The right image leads to the heatmap vizualiser and the right leads to general info about our project.
- On the vizualizer portion of the website, users can click to run one of five tests. The page loads while python creates the video, and when it is done, the page updates with the corresponding Data.
-----------------------------------

