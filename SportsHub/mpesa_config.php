<?php

/*
|--------------------------------------------------------------------------
| Sports Hub - M-Pesa Configuration
|--------------------------------------------------------------------------
| IMPORTANT:
| Replace the placeholder values with your Daraja sandbox credentials.
| Never upload this file containing real credentials to GitHub.
|--------------------------------------------------------------------------
*/

define('MPESA_ENV', 'sandbox');

define(
    'MPESA_BASE_URL',
    'https://sandbox.safaricom.co.ke'
);

/*
|--------------------------------------------------------------------------
| Daraja Credentials
|--------------------------------------------------------------------------
*/

define('MPESA_CONSUMER_KEY', 'RT0ghBZKSL5LrEvdxuFrxGOeRn9IpcrzX6rKbnZNOr5p73Ry');

define('MPESA_CONSUMER_SECRET', 'jDPGQ1A4R3ERA8xBqLfgxwoxhtHiIA3Jtgg9UGLvfceGvAdIuBVHy4GHBtNgRKLi');

define('MPESA_SHORTCODE', '174379');

define('MPESA_PASSKEY', 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919');


/*
|--------------------------------------------------------------------------
| Callback URL
|--------------------------------------------------------------------------
|
| Safaricom needs to reach this URL from the internet.
| localhost will NOT work for the callback.
|
| We will configure this properly when we reach the callback step.
|
*/

define(
    'MPESA_CALLBACK_URL',
    'https://clarinet-unshaved-shuffle.ngrok-free.dev/SportsHub/mpesa_callback.php'
);

?>