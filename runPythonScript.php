<?php
$pythonPath = "C:\Users\madsw\AppData\Local\Programs\Python\Python39\python.exe"; // Replace with the path to your Python interpreter
$scriptPath = __DIR__ . '\DataToVid.py'; // Replace with the path to your Python script
$existingXMLPath = __DIR__ . '\folder\links.xml'; // Path to existing XML file

// Extract the title element and convert it to a string
$title = (string) simplexml_load_file($existingXMLPath)->link[0]->title;

// Construct the command to run the Python script with the title as an argument
$command = "{$pythonPath} {$scriptPath} {$title}";

// Run the Python script using shell_exec()
$output = shell_exec($command);

// Output the result for debugging purposes
echo "<pre>{$output}</pre>";
?>