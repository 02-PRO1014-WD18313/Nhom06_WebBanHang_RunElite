<?php

// Your VNPAY merchant information
$vnp_TmnCode = 'G710EQG6';
$vnp_HashSecret = ' UXGVBMVJISBMJVOLSFDNXUMGDQZMVEFD';
$vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';

// Get order information
$orderInfo = "Description of your product/services";
$amount = $totalMoney * 100; // VNPAY uses the amount in cents

// Build VNPAY payment URL
$vnp_Params = array(
    'vnp_Version' => '2.1.0',
    'vnp_TmnCode' => $vnp_TmnCode,
    'vnp_Amount' => $amount,
    'vnp_Command' => 'pay',
    'vnp_CreateDate' => date('YmdHis'),
    'vnp_CurrCode' => 'VND',
    'vnp_IpAddr' => $_SERVER['REMOTE_ADDR'],
    'vnp_OrderInfo' => $orderInfo,
    'vnp_ReturnUrl' => 'YOUR_RETURN_URL', // Replace with your return URL
    'vnp_TxnRef' => date('YmdHis'),
    'vnp_Locale' => 'vn',
    'vnp_Currency' => 'VND',
);

ksort($vnp_Params);

$query = "";
$i = 0;
$hashdata = "";

foreach ($vnp_Params as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . $key . "=" . $value;
    } else {
        $hashdata .= $key . "=" . $value;
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url .= "?" . $query;

// Generate secure hash
$vnp_HashSecret .= '&' . md5($hashdata);

$vnpSecureHash = hash('sha256', $vnp_HashSecret);

// Add secure hash to the VNPAY parameters
$vnp_Params['vnp_SecureHashType'] = 'SHA256';
$vnp_Params['vnp_SecureHash'] = $vnpSecureHash;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VNPAY Payment</title>
</head>

<body>
    <h1>Redirecting to VNPAY for payment...</h1>
    <p>Please wait, you are being redirected to the VNPAY payment gateway.</p>

    <!-- Automatically submit the form to VNPAY -->
    <form method="post" action="<?php echo $vnp_Url; ?>" id="vnpay-form">
        <?php
        foreach ($vnp_Params as $key => $value) {
            echo '<input type="hidden" name="' . $key . '" value="' . $value . '" />';
        }
        ?>
    </form>

    <script>
        document.getElementById('vnpay-form').submit();
    </script>
</body>

</html>
