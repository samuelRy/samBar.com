<?php
session_start();
$host = "localhost";
$dbname = "samBar_com";
$user = "root";
$pass = "";

$pdo = new PDO(
    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
    $user,
    $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);


    $message = htmlspecialchars($_POST['message']);
    $ins = $pdo->prepare("INSERT INTO messages(email, ".'message'.") VALUES (:email, :t_message)");
    $ins->execute(array('email' => $_SESSION['email'], 't_message' => $_POST["message"]));

$_SESSION["sent"] = true;
$_SESSION["message"]= $_POST["message"];
header("Location: home.php");
?>