<?php

require_once "db.php";

header("Content-Type: application/json");

try {

    /*
    |--------------------------------------------------------------------------
    | Receive Safaricom Callback
    |--------------------------------------------------------------------------
    */

    $rawData = file_get_contents("php://input");

    $data = json_decode($rawData, true);

    if (!$data) {
        throw new Exception("Invalid callback data.");
    }

    /*
    |--------------------------------------------------------------------------
    | Extract Callback Information
    |--------------------------------------------------------------------------
    */

    $stkCallback =
        $data["Body"]["stkCallback"] ?? null;

    if (!$stkCallback) {
        throw new Exception("Invalid M-Pesa callback.");
    }

    $merchantRequestId =
        $stkCallback["MerchantRequestID"] ?? null;

    $checkoutRequestId =
        $stkCallback["CheckoutRequestID"] ?? null;

    $resultCode =
        $stkCallback["ResultCode"] ?? null;

    $resultDescription =
        $stkCallback["ResultDesc"] ?? "";

    if (!$checkoutRequestId) {
        throw new Exception(
            "Checkout request ID missing."
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Find Order
    |--------------------------------------------------------------------------
    */

    $stmt = $conn->prepare("
        SELECT id
        FROM orders
        WHERE checkout_request_id = ?
        LIMIT 1
    ");

    $stmt->bind_param(
        "s",
        $checkoutRequestId
    );

    $stmt->execute();

    $result = $stmt->get_result();

    $order = $result->fetch_assoc();

    $stmt->close();

    if (!$order) {
        throw new Exception(
            "Order associated with this payment was not found."
        );
    }

    $orderId = (int) $order["id"];

    /*
    |--------------------------------------------------------------------------
    | Payment Successful
    |--------------------------------------------------------------------------
    */

    if ((int) $resultCode === 0) {

        $mpesaReceipt = null;
        $transactionDate = null;

        /*
        | CallbackMetadata contains the receipt,
        | amount, phone number, transaction date, etc.
        */

        $metadata =
            $stkCallback["CallbackMetadata"]["Item"]
            ?? [];

        foreach ($metadata as $item) {

            $name = $item["Name"] ?? "";
            $value = $item["Value"] ?? null;

            if ($name === "MpesaReceiptNumber") {
                $mpesaReceipt = (string) $value;
            }

            if ($name === "TransactionDate") {
                $transactionDate = (string) $value;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Mark Payment Completed
        |--------------------------------------------------------------------------
        */

        $update = $conn->prepare("
            UPDATE orders
            SET
                status = 'Paid',
                payment_status = 'Completed',
                mpesa_receipt = ?,
                transaction_date = ?
            WHERE id = ?
        ");

        $update->bind_param(
            "ssi",
            $mpesaReceipt,
            $transactionDate,
            $orderId
        );

        $update->execute();
        $update->close();

    } else {

        /*
        |--------------------------------------------------------------------------
        | Payment Failed / Cancelled
        |--------------------------------------------------------------------------
        */

        $update = $conn->prepare("
            UPDATE orders
            SET
                payment_status = 'Failed'
            WHERE id = ?
        ");

        $update->bind_param(
            "i",
            $orderId
        );

        $update->execute();
        $update->close();
    }

    /*
    |--------------------------------------------------------------------------
    | Always Acknowledge Callback
    |--------------------------------------------------------------------------
    */

    echo json_encode([
        "ResultCode" => 0,
        "ResultDesc" => "Callback received successfully"
    ]);

} catch (Throwable $e) {

    /*
    |--------------------------------------------------------------------------
    | Log callback errors
    |--------------------------------------------------------------------------
    */

    error_log(
        "Sports Hub M-Pesa Callback Error: " .
        $e->getMessage()
    );

    /*
    | Still acknowledge the callback so Safaricom
    | receives a valid response.
    */

    echo json_encode([
        "ResultCode" => 0,
        "ResultDesc" => "Callback received"
    ]);
}
?>