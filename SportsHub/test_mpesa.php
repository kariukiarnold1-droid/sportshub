<?php

require_once "mpesa_config.php";
require_once "mpesa_token.php";

try {

    $token = getMpesaAccessToken();

    echo "<h2>M-Pesa Connection Test</h2>";
    echo "<p style='color:green;'>SUCCESS! M-Pesa access token obtained.</p>";

    // Don't display the actual token
    echo "<p>OAuth authentication is working correctly.</p>";

} catch (Exception $e) {

    echo "<h2>M-Pesa Connection Test</h2>";
    echo "<p style='color:red;'>ERROR:</p>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
}
?>