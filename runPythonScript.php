<?php
$pythonPath = 'C:\xampp\htdocs\miniprojekt\TWSM-miniproject\TWSMenv\Scripts\python.exe'; // Replace with the path to your Python interpreter
$scriptPath = 'C:\xampp\htdocs\miniprojekt\TWSM-miniproject\DataToVid.py'; // Replace with the path to your Python script

$output = shell_exec($pythonPath . ' ' . $scriptPath);
echo "<pre>$output</pre>";
echo shell_exec($pythonPath . ' ' . $scriptPath. ' 2>&1');

/* For developer eyes only! This is the URL you need to use for href in HTML http://localhost/TWSM-miniproject/runPythonScript.php replace folder
   and php-file names accordingly. */
?>
