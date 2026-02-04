<?php
session_start();
$config = require 'config_db.php';
$host = $config['db']['host'];
$dbname = $config['db']['name'];
$user = $config['db']['user'];
$pass = $config['db']['pass'];

// Add SSL for Aiven connection
$conn = mysqli_init(); // Initialize instead of direct new mysqli()

// Set SSL options for Aiven
mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

// Connect with SSL (MYSQLI_CLIENT_SSL flag)
if (!$conn->real_connect($host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to utf8mb4
$conn->set_charset("utf8mb4");

// Your message insertion code with mysqli prepared statements
$message = htmlspecialchars($_POST['message']);
$email = $_SESSION['email'];

// Prepare statement
$stmt = $conn->prepare("INSERT INTO messages (email, ".'message'.") VALUES (?, ?)");

// Bind parameters ('ss' means both are strings)
$stmt->bind_param("ss", $email, $message);

// Execute


// Close statement and connection
$stmt->close();
$conn->close();

$_SESSION["sent"] = true;
$_SESSION["message"]= $_POST["message"];
header("Location: home.php");
?>