
<?php

$act = "sanpham";
if (isset($_GET["act"])) {
    $act = $_GET["act"];
}

switch ($act) {
    case "sanpham":  
        include "./view/sanpham.php";
        break;
    case "detail":

        include "./view/sanphamchitiet.php";
        break;
   
    case "tang":
        $hh = new hanghoa();
        $result1 = $hh->getnhom();
        $countnhom = $result1->rowCount();
        if($_SESSION['trang'] < $countnhom-4){
        $_SESSION['trang']++; 
        }
        include "./view/sanpham.php";
        break;
    case "giam":
        if($_SESSION['trang']>0){
            $_SESSION['trang']--; 
        }
        include "./view/sanpham.php";
        break;
    default:
        include "./view/sanpham.php";
        break;
}

?>