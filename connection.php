<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "databaseg4";  // Database name should match the one used in other scripts

// Try connecting to the database
$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "";
?>
