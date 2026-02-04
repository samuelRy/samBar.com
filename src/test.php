<?php
// db_ssl.php - WITH PROPER SSL
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'mysql-2bca0261-elijahsamuelbarkah-ca79.a.aivencloud.com';
$port = 16281;
$user = 'avnadmin';
$pass = $config['db']['pass']; // ← MUST BE CORRECT
$dbname = $config['db']['name'];

echo "Testing Aiven connection with SSL...<br>";

// Method 1: mysqli with SSL
$conn = mysqli_init();

// Set SSL options
mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

// IMPORTANT: Increase timeout
mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 10);

// Connect with SSL
if (!mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL)) {
    echo "SSL set failed<br>";
}

if ($conn->real_connect($host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    echo "✅ Connected with SSL!<br>";
    echo "SSL Cipher: " . ($conn->get_ssl_cipher() ?: 'Not available') . "<br>";
    echo "Server: " . $conn->server_info . "<br>";
    $conn->close();
} else {
    echo "❌ SSL connection failed: " . mysqli_connect_error() . "<br>";
    echo "Error code: " . mysqli_connect_errno() . "<br>";
}
?>