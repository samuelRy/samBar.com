<?php
// config.php - SAFE to commit

$host = $_SERVER['DB_HOST'] ?? 'localhost';
$port = $_SERVER['DB_PORT'] ?? 3306;
$user = $_SERVER['DB_USER'] ?? 'root';
$pass = $_SERVER['DB_PASS'] ?? '';
$name = $_SERVER['DB_NAME'] ?? 'defaultdb';
echo $_SERVER['DB_NAME'];
echo $_ENV['DB_NAME'];
echo getenv('DB_NAME');

return [
    'db' => [
        'host' => $host,
        'port' => $port,
        'user' => $user,
        'pass' => $pass,
        'name' => $name
    ]
];
?>