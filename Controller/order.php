<?php

// Insert vào bảng hóa đơn xog mới insert vào bảng chi tiết háo đơn
if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
    if ($_SESSION['makh']) {
        $makh = $_SESSION['makh'];
        $order = new order();
        $masohd = $order->InsertOrder($makh);
        // Insert vào bảng chi tiết hóa đơn
        // Duyệt qua $_session['giohang']
        $total = 0;
        foreach ($_SESSION['giohang'] as $key => $item) {
            $date = date('Y-m-d');
            $newdate = strtotime('+' . $item['quanty'] . ' day', strtotime($date));
            $newdate = date('Y-m-d', $newdate);
            $order->insertOrderDetail($masohd, $item['maxe'], $item['quanty'], $date, $newdate, ($item['total']));
            $total += $item['total']; 
        }
        if (isset($_SESSION['tiengiamgia'])) {
            $total = $total - $_SESSION['tiengiamgia'];
        }
        // $tiencuoi=$total-$giamgia+ $_SESSION['phivanchuyen'];
        // echo "giam gia".$tiencuoi;
        // echo $_SESSION['phivanchuyen'];
        $order->updateTotal($masohd, $total);
        $orderDetail = $order->getInfoOrder($masohd);
        $khDetail = $order->getInfoKhachhang($masohd);

        if (isset($_SESSION['magiamgia'])) {
            $gg = new voucher();
            $gg->giamgia($_SESSION['magiamgia'], $makh, $masohd, $_SESSION['tiengiamgia']);
        }
        if (isset($_SESSION['magiamgia'])) {
            unset($_SESSION['magiamgia']);
            unset($_SESSION['tiengiamgia']);
        }

    }
    echo '<script>alert("thuê xe thành công")</script>';
    include_once "./View/order.php";
} else {
    echo '<script>alert("giỏ hàng rỗng vui lòng chọn sản phẩm trước khi thanh toán ")</script>';
    include_once "./View/sanpham.php";
}