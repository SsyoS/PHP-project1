<?php
$act = 'gioithieu';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'gioithieu':
        include "./View/gioithieu.php";
        break;

}

?>