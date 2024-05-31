<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

$new_username = "newuser";
$new_password = md5("newpassword");

$sql = "INSERT INTO users (username, password) VALUES ('$new_username', '$new_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
