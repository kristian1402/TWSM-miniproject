<?php
$pythonPath = __DIR__ . '\TWSMenv\Scripts\python.exe'; // Replace with the path to your Python interpreter
$scriptPath = __DIR__ . '\DataToVid.py'; // Replace with the path to your Python script
$existingXMLPath = __DIR__ . '\folder\links.xml'; // Path to existing XML file

// Load the XML document
$xml = simplexml_load_file($existingXMLPath);

// Get the desired string to add to the XML
$current_time = shell_exec("$pythonPath -c \"import sys; exec(sys.stdin.read()); print(current_time)\" < \"$scriptPath\"");
$current_time = trim($current_time);
echo $current_time;

// Find the existing desiredString element and update its value
$desiredString = $xml->xpath('//desiredString')[0];
$desiredString->nodeValue = $current_time;

// Save the modified XML document
$xml->asXML($existingXMLPath);

// Output a success message
echo "String added to existing XML document.";

$output = shell_exec($pythonPath . ' ' . $scriptPath);
echo "<pre>$output</pre>";
echo shell_exec($pythonPath . ' ' . $scriptPath. ' 2>&1');

/* For developer eyes only! This is the URL you need to use for href in HTML http://localhost/TWSM-miniproject/runPythonScript.php replace folder
   and php-file names accordingly. */
?>
