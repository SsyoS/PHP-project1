<?php
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = array();
}
$act = "giohang";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'giohang':
        if (isset($_POST['maxe'])) {
            $maxe = $_POST['maxe'];
            $soluong = $_POST['soluong'];
            $gh = new giohang();
            $gh->add_items($maxe, $soluong);
        }
        include "./View/giohang.php";
        break;
    case "khuyenmai":
        if (isset($_GET["ma"])) {
            $ma = $_GET['ma'];

            if (isset($_SESSION['makh'])) {
                $makh = $_SESSION['makh'];
                $_SESSION['magiamgia'] = $ma;
            }
        }
        include "./view/giohang.php";
        break;
    case "xoa":
        if (isset($_SESSION['magiamgia'])) {
            unset($_SESSION['magiamgia']);
            unset($_SESSION['tiengiamgia']);
        }
        include "./view/giohang.php";
        break;
    case 'delete_item':
        if (isset($_GET['id'])) {
            $indexs = $_GET['id'];
            $gh = new giohang();
            $gh->delete_items($indexs);
        }
        include "./View/giohang.php";
        break;
    case 'update_item':
        if (isset($_POST['newqty'])) {
            $new_list = $_POST['newqty'];
            foreach ($new_list as $vitri => $qty) {
                if ($_SESSION['giohang'][$vitri]['quanty'] != $qty) {
                    $gh = new giohang();
                    $gh->update_items($vitri, $qty);
                }
            }
        }
        include "./View/giohang.php";
        break;
}