<?php
include "view/buy_now_result.php";
// Trong return.php
if (isset($_GET['vnp_ResponseCode'])) {
    $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
    
    // Xử lý kết quả thanh toán tại đây
    if ($vnp_ResponseCode == '00') {
    //     $status="check";
    //     // Lấy dữ liệu từ URL
    //    update_status($status);
            // Ví dụ: insert_donhang($pr_name, $product_price, $quantity, $name, $phone, $address, $note, $pay, $totalMoney, $id_user, $order_date);

            // Hiển thị thông báo hoặc thực hiện các hành động khác
            // echo json_encode( $returnData_succes);
            echo "Thanh toán thành công!";
       
    } else {
        // Thanh toán thất bại
        // Hiển thị thông báo lỗi cho người dùng
        echo "Thanh toán thất bại!";
    }
} else {
    // Trường hợp không có dữ liệu trả về từ VNPAY
    echo "Không có dữ liệu trả về từ VNPAY";
}

?>
