<?php

$act = 'edit';
if (isset($_GET['act'])) {
  $act = $_GET['act'];
}
switch ($act) {
  case 'edit':
    include "./View/editdiadiem.php";
    break;
  case 'add':
    $a = new validate();
    $b = $a->checkloai();
    if ($b == 1) {
      $tendiadiem = $_POST['tenloai'];
      $l = new diadiem();
      $l->insertloai($tendiadiem);
      include "./View/editdiadiem.php";
      break;
    } else {
      include "./View/editdiadiem.php";
      break;
    }
  case 'delete':
    $madiadiem = $_GET['ma'];
    $l = new diadiem();
    $l->deleteloai( $madiadiem);
    $l->deleteloai1( $madiadiem);
    $l->deleteloai2( $madiadiem);
    $l->deleteloai3( $madiadiem);

    include "./View/editdiadiem.php";
    break;
  case 'update':
    $a = new validate();
    $b = $a->checkloai();
    if ($b == 1) {
    $madiadiemcu = $_GET['ma'];
    $madiadiemmoi = $_POST['ml'];
    $tendiadiem = $_POST['tenloai'];
    $l = new diadiem();
    $l->upadteloai($madiadiemmoi, $tendiadiem, $madiadiemcu);
    include "./View/editdiadiem.php";
    break;
    }else {
      echo '<script> alert("'.$_SESSION['loaiErr'] .'");</script>';
      include "./View/editdiadiem.php";
      break;
    }
  case 'chon':
    $_SESSION['check'] = 1;
    include "./View/editdiadiem.php";
    break;
  case 'huychon':
    $_SESSION['check'] = 0;
    include "./View/editdiadiem.php";
    break;
  case 'xoa':
    $hh = new hanghoa();
    $l = new diadiem();
    $result = $hh->getmaloai();
    while ($set = $result->fetch()) {
      $ma = $set['madiadiem'];
      if (isset($_POST[$ma])) {
        echo($_POST[$ma]);
        $maloai = $_POST[$ma];
      }
    }

    include "./View/editdiadiem.php";
    break;
  case 'loai':
    if (isset($_POST['submit_file'])) {
      $file = $_FILES['file']['tmp_name'];
      file_put_contents($file, str_replace("\xBB\xEF\xBF", "", file_get_contents($file)));
      $file_open = fopen($file, "r");
      while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
        $madiadiem = $csv[0];
        $tendiadiem = $csv[1];
        $db = new connect();
        $query = "insert into diadiem(madiadiem,tendiadiem) values('$madiadiem','$tendiadiem')";
        $db->exec($query);
      }
      echo ('<script> alert(" import thanh cong") </script>');
    }
    include "./View/editdiadiem.php";
    break;
}
?>