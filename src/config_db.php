<?php
// config.php - SAFE to commit
return [
    'db' => [
        'host' => $_ENV('DB_HOST') ?: 'localhost',
        'port' => $_ENV('DB_PORT') ?: 3306,
        'user' => $_ENV('DB_USER') ?: 'root',
        'pass' => $_ENV('DB_PASS') ?: '',
        'name' => $_ENV('DB_NAME') ?: 'my_db'
    ]
];
?>