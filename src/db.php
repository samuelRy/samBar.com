<?php
session_start();
$config = require 'config_db.php';
$host = $config['db']['host'];
$dbname = $config['db']['name'];
$user = $config['db']['user'];
$pass = $config['db']['pass'];

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8mb4 (same as PDO's charset=utf8mb4)
$conn->set_charset("utf8mb4");

// Your message insertion code with mysqli prepared statements
$message = htmlspecialchars($_POST['message']);
$email = $_SESSION['email'];

// Prepare statement (similar to PDO)
$stmt = $conn->prepare("INSERT INTO messages (email, message) VALUES (?, ?)");

// Bind parameters ('ss' means both are strings)
$stmt->bind_param("ss", $email, $message);

// Execute
if ($stmt->execute()) {
    echo "Message inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
$_SESSION["sent"] = true;
$_SESSION["message"]= $_POST["message"];
header("Location: home.php");
?>