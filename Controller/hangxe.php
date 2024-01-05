<?php

$act = 'edit';
if (isset($_GET['act'])) {
  $act = $_GET['act'];
}
$_SESSION['check1'] = 0;
switch ($act) {
  case 'edit':
    include "./View/edithangxe.php";
    break;
  case 'add':
    $a = new validate();
    $b = $a->checkhangxe();
    if ($b == 1) {
      $tenhangxe = $_POST['hangxe'];
      $l = new hangxe();
      $l->insertloai($tenhangxe);
      include "./View/edithangxe.php";
      break;
    } else {
      include "./View/edithangxe.php";
      break;
    }
  case 'delete':
    $mahangxe = $_GET['ma'];
    $l = new hangxe();
    $l->deleteloai( $mahangxe);
    $l->deleteloai1( $mahangxe);
    $l->deleteloai2( $mahangxe);
    $l->deleteloai3( $mahangxe);

    include "./View/edithangxe.php";
    break;
  case 'update':
    $a = new validate();
    $b = $a->checkhangxe();
    if ($b == 1) {
    $mahangxecu = $_GET['ma'];
    $mahangxemoi = $_POST['mahangxe'];
    $hangxe = $_POST['hangxe'];
    $l = new hangxe();
    $l->upadteloai($mahangxemoi, $hangxe, $mahangxecu);
    include "./View/edithangxe.php";
    break;
    }else {
      echo '<script> alert("'.$_SESSION['hangxeErr'] .'");</script>';
      include "./View/edithangxe.php";
      break;
    }
  case 'chon':
    $_SESSION['check1'] = 1;
    include "./View/edithangxe.php";
    break;
  case 'huychon':
    $_SESSION['check1'] = 0;
    include "./View/edithangxe.php";
    break;
  case 'xoa':
    $hh = new hanghoa();
    $l = new hangxe();
    $result = $hh->gethangxe1();
    while ($set = $result->fetch()) {
      $ma = $set['mahangxe'];
      if (isset($_POST[$ma])) {
        echo($_POST[$ma]);
        $maloai = $_POST[$ma];
      }
    }

    include "./View/edithangxe.php";
    break;
  case 'loai':
    if (isset($_POST['submit_file'])) {
      $file = $_FILES['file']['tmp_name'];
      file_put_contents($file, str_replace("\xBB\xEF\xBF", "", file_get_contents($file)));
      $file_open = fopen($file, "r");
      while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
        $mahangxe = $csv[0];
        $tenhangxe = $csv[1];
        $db = new connect();
        $query = "insert into hangxe(mahangxe,tenhangxe) values('$mahangxe','$tenhangxe')";
        $db->exec($query);
      }
      echo ('<script> alert(" import thanh cong") </script>');
    }
    include "./View/edithangxe.php";
    break;
}
?>