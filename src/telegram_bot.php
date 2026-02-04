<?php
/**
 * Send message to Telegram
 * Usage: sendToTelegram("Hello World!");
 */
function sendToTelegram($message) {
    // Your credentials
    $botToken = '8440622204:AAG74nxkPFZrPbCDLzaONhEmHxLlNLcajxM';  // Keep this secret!
    $chatId = '7958189289';              // Your chat ID
    
    // Prepare the API URL
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    
    // Message data
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML' // Optional: for formatting
    ];
    
    // Use cURL to send
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    $result = curl_exec($ch);
    curl_close($ch);
    
    // Return the response
    return json_decode($result, true);
}

// ==================== USAGE EXAMPLES ====================

// Example 1: Simple message
sendToTelegram("PHP script executed at " . date('H:i:s'));

// Example 2: Formatted message
sendToTelegram("<b>Important Alert!</b>\nServer backup completed successfully.");

// Example 3: Error notification
try {
    // Your code here...
    // If something goes wrong:
    throw new Exception("Database connection failed");
} catch (Exception $e) {
    sendToTelegram("❌ ERROR: " . $e->getMessage());
}
?>