<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/Nhom06_WebBanHang_RunElite/index.php?act=return_pay";
$vnp_TmnCode = "CJQLSZK0"; // Mã website tại VNPAY
$vnp_HashSecret = "PQGKUSFGBQOLLFANZNVGCDLJYREUIXPI"; // Chuỗi bí mật
$vnp_apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

$vnp_TxnRef = time() . ''; // Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại web';
$vnp_OrderType = 'billpayment';
$vnp_Amount = $totalMoney * 100;
$vnp_Locale = 'vn';
$vnp_BankCode = 'NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

$vnp_ExpireDate = $expire;

// Tạo mảng tham số
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate" => $vnp_ExpireDate
);
if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
// Sắp xếp mảng theo key để tạo chuỗi tham số
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array(
    'code' => '00',
    'message' => 'success',
    'data' => $vnp_Url
);
$returnData_succes = array(
    'code' => '00',
    'message' => 'success',
    'data' => $vnp_Url,
    'name='.$name
);
if (isset($_POST['order_click'])) {
    header('Location: ' . $vnp_Url);
  
  
    die();
} else {
    echo json_encode($returnData);
}

?>

