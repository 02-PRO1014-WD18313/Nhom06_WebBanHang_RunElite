<?php

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
            echo '<div class="container-buy_now_result">
            <div class="icon">
                <i class="fa-solid fa-circle-check " style="color: #00ff04; font-size: 100px;"></i>
            </div>
            <div class="buy_now_result_content">
        Đặt Hàng Thành Công, Chúng Tôi Sẽ Gọi Cho Bạn Để Xác Nhận Đơn Hàng .
            </div>
        </div>';
       
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
