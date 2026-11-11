<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sports Hub M-Pesa Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f5f5f5;
        }

        .box {
            max-width: 450px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        input, button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        button {
            background: #198754;
            color: white;
            border: none;
            cursor: pointer;
        }

        #result {
            margin-top: 20px;
            padding: 10px;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>Sports Hub M-Pesa Test</h2>

    <label>Order ID</label>
    <input type="number" id="order_id" placeholder="Example: 1">

    <label>M-Pesa Phone Number</label>
    <input type="text" id="phone" placeholder="2547XXXXXXXX">

    <button onclick="sendPayment()">
        Send STK Push
    </button>

    <div id="result"></div>

</div>

<script>

async function sendPayment() {

    const orderId = document.getElementById("order_id").value;
    const phone = document.getElementById("phone").value;
    const result = document.getElementById("result");

    result.innerHTML = "Sending payment request...";

    try {

        const response = await fetch("mpesa_stk.php", {

            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify({
                order_id: orderId,
                phone: phone
            })

        });

        const data = await response.json();

        if (data.success) {

            result.innerHTML =
                "<strong style='color:green;'>" +
                data.message +
                "</strong>";

        } else {

            result.innerHTML =
                "<strong style='color:red;'>" +
                data.message +
                "</strong>";

        }

    } catch (error) {

        result.innerHTML =
            "<strong style='color:red;'>" +
            "Connection error: " +
            error.message +
            "</strong>";

    }
}

</script>

</body>
</html>