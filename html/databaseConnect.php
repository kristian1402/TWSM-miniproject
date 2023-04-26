<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csvfiles";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if there is any connection
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create an array with collum names: COL 1-4 this is hardcoded which is very nice :)
$headers = array("COL 1", "COL 2", "COL 3", "COL 4");

// Set character set and allow php to automatically detect line changes
mysqli_set_charset($conn, "utf8");
ini_set('auto_detect_line_endings', true);

// Get the table name from an HTML user input
$table_name = $_POST['table_name'];

// Create the SQL query string using the data given by html to look up a predetermined file.
$sql = "SELECT `" . implode("`, `", $headers) . "` FROM $table_name";

$result = mysqli_query($conn, $sql);

// make sure query was sucessfull
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Set filename and data header
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