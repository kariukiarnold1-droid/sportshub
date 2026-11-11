<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "db.php";
require_once "mpesa_token.php";

/*
|--------------------------------------------------------------------------
| SIMPLE M-PESA STK PUSH
|--------------------------------------------------------------------------
*/

try {

    // Only POST is allowed
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        http_response_code(405);
        echo json_encode([
            "success" => false,
            "message" => "Invalid request method."
        ]);
        exit;
    }

    // Read request
    $input = json_decode(file_get_contents("php://input"), true);

    if (!is_array($input)) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid request data."
        ]);
        exit;
    }

    $orderId = (int)($input["order_id"] ?? 0);
    $phone = trim($input["phone"] ?? "");

    if ($orderId <= 0) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid order ID."
        ]);
        exit;
    }

    if (!preg_match('/^7\d{8}$/', $phone)) {
        echo json_encode([
            "success" => false,
            "message" => "Enter the M-Pesa number as 7XXXXXXXX."
        ]);
        exit;
    }

    // Convert 7XXXXXXXX to 2547XXXXXXXX
    $phone = "254" . $phone;

    /*
    |--------------------------------------------------------------------------
    | GET ORDER
    |--------------------------------------------------------------------------
    */

    $stmt = $conn->prepare("
        SELECT id, total, payment_status
        FROM orders
        WHERE id = ?
        LIMIT 1
    ");

    if (!$stmt) {
        throw new Exception("Could not prepare order query.");
    }

    $stmt->bind_param("i", $orderId);
    $stmt->execute();

    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    $stmt->close();

    if (!$order) {
        echo json_encode([
            "success" => false,
            "message" => "Order not found."
        ]);
        exit;
    }

    if (($order["payment_status"] ?? "") === "Completed") {
        echo json_encode([
            "success" => false,
            "message" => "This order has already been paid."
        ]);
        exit;
    }

    $amount = (int)round((float)$order["total"]);

    if ($amount < 1) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid order amount."
        ]);
        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | GET ACCESS TOKEN
    |--------------------------------------------------------------------------
    */

    $accessToken = getMpesaAccessToken();

    /*
    |--------------------------------------------------------------------------
    | CREATE PASSWORD
    |--------------------------------------------------------------------------
    */

    $timestamp = date("YmdHis");

    $password = base64_encode(
        MPESA_SHORTCODE .
        MPESA_PASSKEY .
        $timestamp
    );

    /*
    |--------------------------------------------------------------------------
    | STK PUSH REQUEST
    |--------------------------------------------------------------------------
    */

    $url = MPESA_BASE_URL .
        "/mpesa/stkpush/v1/processrequest";

    $payload = [
        "BusinessShortCode" => MPESA_SHORTCODE,
        "Password" => $password,
        "Timestamp" => $timestamp,
        "TransactionType" => "CustomerPayBillOnline",
        "Amount" => $amount,
        "PartyA" => $phone,
        "PartyB" => MPESA_SHORTCODE,
        "PhoneNumber" => $phone,
        "CallBackURL" => MPESA_CALLBACK_URL,
        "AccountReference" => "SportsHub-" . $orderId,
        "TransactionDesc" => "Sports Hub Order " . $orderId
    ];

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer " . $accessToken,
            "Content-Type: application/json",
            "Accept: application/json"
        ],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 60
    ]);

    $response = curl_exec($ch);
    $curlError = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($response === false) {
        throw new Exception(
            "Could not connect to M-Pesa: " . $curlError
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DECODE M-PESA RESPONSE
    |--------------------------------------------------------------------------
    */

    $data = json_decode($response, true);

    if (!is_array($data)) {
        throw new Exception(
            "M-Pesa returned an unexpected response."
        );
    }

    /*
    |--------------------------------------------------------------------------
    | M-PESA REJECTED REQUEST
    |--------------------------------------------------------------------------
    */

    if (($data["ResponseCode"] ?? "") !== "0") {

        $message =
            $data["errorMessage"]
            ?? $data["ResponseDescription"]
            ?? $data["ResponseDesc"]
            ?? "M-Pesa rejected the STK Push request.";

        echo json_encode([
            "success" => false,
            "message" => $message,
            "http_code" => $httpCode
        ]);

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | SAVE M-PESA REQUEST IDs
    |--------------------------------------------------------------------------
    */

    $merchantRequestId =
        $data["MerchantRequestID"] ?? "";

    $checkoutRequestId =
        $data["CheckoutRequestID"] ?? "";

    $update = $conn->prepare("
        UPDATE orders
        SET
            mpesa_phone = ?,
            merchant_request_id = ?,
            checkout_request_id = ?,
            payment_status = 'Pending'
        WHERE id = ?
    ");

    if (!$update) {
        throw new Exception(
            "Could not prepare payment update."
        );
    }

    $update->bind_param(
        "sssi",
        $phone,
        $merchantRequestId,
        $checkoutRequestId,
        $orderId
    );

    $update->execute();
    $update->close();

    /*
    |--------------------------------------------------------------------------
    | SUCCESS
    |--------------------------------------------------------------------------
    */

    echo json_encode([
        "success" => true,
        "message" => "M-Pesa payment prompt sent successfully.",
        "order_id" => $orderId,
        "checkout_request_id" => $checkoutRequestId
    ]);

} catch (Throwable $e) {

    error_log(
        "Sports Hub STK Push Error: " . $e->getMessage()
    );

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}

exit;
?>
