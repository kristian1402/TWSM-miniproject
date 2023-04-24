<?php
$pythonPath = 'C:\Users\madsw\AppData\Local\Programs\Python\Python39\python.exe'; // Replace with the path to your Python interpreter
$scriptPath = 'C:\xampp\htdocs\projectFolder\runPythonScript.py'; // Replace with the path to your Python script

$output = shell_exec($pythonPath . ' ' . $scriptPath);
echo "<pre>$output</pre>";

/* For developer eyes only! This is the URL you need to use for href in HTML http://localhost/SampleFolder/SamplePHP.php replace folder
   and php-file names accordingly. */
?>
