<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csvfiles";

$existingXMLPath = __DIR__ . '\folder\links.xml'; // Path to existing XML file

$index = $_GET["index"];
$title = (string) simplexml_load_file($existingXMLPath)->link[$index-1]->db;

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define column names
$headers = array("COL 1", "COL 2", "COL 3", "COL 4");

// Set character set and delimiter for CSV file
mysqli_set_charset($conn, "utf8");
ini_set('auto_detect_line_endings', true);


$sql = "SELECT `" . implode("`, `", $headers) . "` FROM {$title}";
// Perform a SQL query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Set the header information
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Loop through the rows and output them as CSV data
while ($row = mysqli_fetch_row($result)) {
    fputcsv($output, $row, ';');
}

// Close the file pointer
fclose($output);

// Close the database connection
mysqli_close($conn);
?>