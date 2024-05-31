<?php
$servername = "13.126.201.123";
$username = "sridhar";
$password = "sridhar123";
$dbname = "dynamic_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
