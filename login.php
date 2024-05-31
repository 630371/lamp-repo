<?php
#include 'db_config.php';
#session_start();
#
#// Enable error reporting
#error_reporting(E_ALL);
#ini_set('display_errors', 1);
#
#if ($_SERVER["REQUEST_METHOD"] == "POST") {
#    $username = $_POST['username'];
#    $password = $_POST['password'];
#
#    // Check if the username exists
#    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
#    $stmt->bind_param("s", $username);
#    $stmt->execute();
#    $stmt->store_result();
#
#    if ($stmt->num_rows > 0) {
#        // User exists, verify password
#        $stmt->bind_result($id, $hashed_password);
#        $stmt->fetch();
#
#        if (password_verify($password, $hashed_password)) {
#            // Password is correct, redirect to welcome page
#            $_SESSION['username'] = $username;
#            header("Location: welcome.php");
#            exit();
#        } else {
#            echo "Invalid username or password";
#        }
#    } else {
#        // User does not exist, create new user
#        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
#        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
#        $stmt->bind_param("ss", $username, $hashed_password);
#
#        if ($stmt->execute()) {
#            $_SESSION['username'] = $username;
#            header("Location: welcome.php");
#            exit();
#        } else {
#            echo "Error:>
#
#
#
#include 'db_config.php';
#session_start();
#
#// Enable error reporting
#error_reporting(E_ALL);
#ini_set('display_errors', 1);
#
#$message = "";
#
#if ($_SERVER["REQUEST_METHOD"] == "POST") {
#    $username = $_POST['username'];
#    $password = $_POST['password'];
#
#    // Check if the username exists
#    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
#    $stmt->bind_param("s", $username);
#    $stmt->execute();
#    $stmt->store_result();
#
#    if ($stmt->num_rows > 0) {
#        // User exists, verify password
#        $stmt->bind_result($id, $hashed_password);
#        $stmt->fetch();
#
#        if (password_verify($password, $hashed_password)) {
#            // Password is correct, redirect to welcome page
#            $_SESSION['username'] = $username;
#            header("Location: welcome.php");
#            exit();
#        } else {
#            $message = "Invalid username or password";
#        }
#    } else {
#        // User does not exist, create new user
#        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
#        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
#        $stmt->bind_param("ss", $username, $hashed_password);
#
#        if ($stmt->execute()) {
#            $_SESSION['username'] = $username;
#            header("Location: welcome.php");
#            exit();
#        } else {
#            $message = "Error: " . $stmt->error;
#        }
#    }
#
#    $stmt->close();
#    $conn->close();
#}
#
#
#<!DOCTYPE html>
#<html>
#<head>
#    <title>Login or Register</title>
#    <link rel="stylesheet" type="text/css" href="style.css">
#</head>
#<body>
#    <div class="container">
#        <h2>Login or Register</h2>
#        <?php if ($message): 
include 'db_config.php';
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User exists, verify password
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Password is correct, redirect to welcome page
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            $message = "Invalid username or password";
        }
    } else {
        // User does not exist, create new user
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            $_SESSION['message'] = "Registration successful!";
            header("Location: welcome.php");
            exit();
        } else {
            $message = "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login or Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login or Register</h2>
        <?php if ($message): ?>
            <p style="color: red;"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login/Register">
            </div>
        </form>
    </div>
</body>
</html>
