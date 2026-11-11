<?php

require_once "mpesa_config.php";

/*
|--------------------------------------------------------------------------
| Get M-Pesa OAuth Access Token
|--------------------------------------------------------------------------
*/

function getMpesaAccessToken()
{
    $credentials = base64_encode(
        MPESA_CONSUMER_KEY . ":" . MPESA_CONSUMER_SECRET
    );

    $url = MPESA_BASE_URL .
        "/oauth/v1/generate?grant_type=client_credentials";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Basic " . $credentials
    ]);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $response = curl_exec($ch);

    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);

        throw new Exception(
            "M-Pesa connection error: " . $error
        );
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    $data = json_decode($response, true);

    if ($httpCode !== 200 || !isset($data["access_token"])) {
        throw new Exception(
            "Unable to obtain M-Pesa access token. Response: " .
            $response
        );
    }

    return $data["access_token"];
}

?>