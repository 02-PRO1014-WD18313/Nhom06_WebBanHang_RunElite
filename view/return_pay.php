<?php 


// Lấy dữ liệu từ VNPay
$vnp_ResponseCode = $_GET['vnp_ResponseCode'];
$vnp_TxnRef = $_GET['vnp_TxnRef'];

// Xử lý kết quả thanh toán
if ($vnp_ResponseCode == '00') {
    // Thanh toán thành công
    echo 'Thanh toán thành công. Mã giao dịch: ' . $vnp_TxnRef;
} else {
    // Thanh toán thất bại
    echo 'Thanh toán thất bại. Mã giao dịch: ' . $vnp_TxnRef;
}



?>