<?php

$act = 'home';
if (isset($_GET['act'])) {
  $act = $_GET['act'];
}
switch ($act) {
  case 'home':
    include "./view/thuthapmagiamgia.php";
    break;
  case 'thuthap':
    $mavoucher = $_GET['ma'];
    $v = new voucher();
    $v->thuthap($mavoucher);
    include "./view/giohang.php";
    break;

}

?>