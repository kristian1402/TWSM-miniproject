<?php
$pythonPath = 'C:\Users\khs14\AppData\Local\Programs\Python\Python311\python.exe'; // Replace with the path to your Python interpreter
$scriptPath = 'C:\xampp\htdocs\miniprojekt\TWSM-miniproject\DataToVid.py'; // Replace with the path to your Python script

$output = shell_exec($pythonPath . ' ' . $scriptPath);
echo "<pre>$output</pre>";
echo shell_exec("$pythonPath . ' ' . $scriptPath");

/* For developer eyes only! This is the URL you need to use for href in HTML http://localhost/TWSM-miniproject/runPythonScript.php replace folder
   and php-file names accordingly. */
?>
