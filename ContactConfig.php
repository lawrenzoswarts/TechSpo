<?php
$host = "localhost";
$userName = "fyrhp";
$password = "";
$dbName = "techspo_contact";
// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>