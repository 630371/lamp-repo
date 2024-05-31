<?php
#session_start();
#
#if (!isset($_SESSION['username'])) {
#    header("Location: login.php");
#    exit();
#}
#
#// Check if a message is set and store it in a variable
#$message = "";
#if (isset($_SESSION['message'])) {
#    $message = $_SESSION['message'];
#    unset($_SESSION['message']); // Clear the message after displaying it
#}
#
#
#<!DOCTYPE html>
#<html>
#<head>
#    <title>Welcome</title>
#    <link rel="stylesheet" type="text/css" href="style.css">
#    <style>
#        .button {
#            display: inline-block;
#            padding: 10px 20px;
#            font-size: 16px;
#            color: white;
#            background-color: #007bff;
#            border: none;
#            border-radius: 5px;
#            text-decoration: none;
#            text-align: center;
#            cursor: pointer;
#            transition: background-color 0.3s;
#        }
#
#        .button:hover {
#            background-color: #0056b3;
#        }
#    </style>
#</head>
#<body>
#    <div class="container">
#        <h2>Welcome</h2>
#        <?php if ($message): 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if a message is set and store it in a variable
$message = "";
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Clear the message after displaying it
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            margin: 10px 0;
        }
        .message {
            color: green;
            margin-bottom: 15px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <p>You have successfully logged in.</p>
        <a href="nextpage.html" class="button">Go to Next Page</a>
    </div>
</body>
</html>
