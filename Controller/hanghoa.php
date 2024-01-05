<?php

$act = 'home';
if (isset($_GET['act'])) {
  $act = $_GET['act'];
}
switch ($act) {
  case 'home':
    include "./View/hanghoa.php";
    break;
  case 'add':
    $a = new validate();
    $b = $a->checksanpham();
    if ($b == 1) {
      $maxe = $_POST['maxe'];
      $tenxe = $_POST['tenhh'];
      $dongia = $_POST['dongia'];
      $image = $_FILES['image']['name'];
      $hangxe = $_POST['hangxe'];
      $loaixe = $_POST['loaixe'];
      $Nhom = $_POST['maloai'];
      $soluotthue = 0;
      $date = getdate();
      $ngaylap = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];
      $mota = $_POST['mota'];
      $qlsp = new qlsp();
      $qlsp->Insertsanpham($tenxe, $dongia, $image,$Nhom,$hangxe,$loaixe, $soluotthue, $ngaylap, $mota);
      uploadimage();
      include "./View/hanghoa.php";
      break;
    } else {
      include "./View/hanghoa.php";
      break;
    }
  case 'delete':
    $maxe = $_GET['ma'];
    $qlsp = new qlsp();
    $masohd = 1;
    $qlsp->deletesanpham0($maxe);
    $qlsp->deletesanpham1($maxe);
    $qlsp->deletesanpham($maxe);
    include "./View/hanghoa.php";
    break;
  case 'add1':
    if (isset($_POST['submit_file_sanpham'])) {
      $file = $_FILES['file_sanpham']['tmp_name'];
      file_put_contents($file, str_replace("\xBB\xEF\xBF", "", file_get_contents($file)));
      $file_open = fopen($file, "r");
      while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
        $maxe = $csv[0];
        $tenhh = $csv[1];
        $dongia = $csv[2];
        $hinh = $csv[3];
        $Nhom = $csv[4];
        $hangxe= $csv[5];
        $loaixe= $csv[6];
        $soluotxem = $csv[7];
        $ngaylap = $csv[8];
        $mota = $csv[9];
        $db = new connect();
        $query = "insert into hanghoa(maxe,tenhh,dongia,hinh,Nhom,hangxe,loaixe,soluotthue,ngaylap,mota,tinhtrang)
          values($maxe,'$tenhh',$dongia,'$hinh',$Nhom,$hangxe,$loaixe,$soluotxem,'$ngaylap','$mota',0)";
        $db->exec($query);
      }
      echo ('<script> alert(" import thanh cong") </script>');

    }
    include "./View/hanghoa.php";
    break;
  case 'update':
    $a = new validate();
    $b = $a->checksanphamcatnhat();
    if ($b == 1) {
      $maxe = $_GET['ma'];
      $maxe = $_POST['maxe'];
      $tenhh = $_POST['tenhh'];
      $dongia = $_POST['dongia'];
      if ($_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
      } else {
        $image = $_POST['imageanh'];
      }
      $Nhom = $_POST['maloai'];
      $hangxe = $_POST['hangxe'];
      $loaixe = $_POST['maloaixe'];
      $soluotthue = $_POST['soluotxem'];
      $ngaylap = $_POST['ngaylap'];
      $mota = $_POST['mota'];
      $tinhtrang = $_POST['tinhtrang'];
      $qlsp = new qlsp();
      $qlsp->updatesanpham($maxe,$tenhh, $dongia, $image, $Nhom,$hangxe,$loaixe, $soluotthue, $ngaylap, $mota,$tinhtrang);
      uploadimage();
      include "./View/hanghoa.php";
      break;
    } else {
      if ($_SESSION['tenhhErr'] != "") {
        echo ('<script> alert("' . $_SESSION['tenhhErr'] . '") </script>');
      } else if ($_SESSION['dongiaErr'] != "") {
        echo ('<script> alert("' . $_SESSION['dongiaErr'] . '") </script>');
      } else if ($_SESSION['motaErr'] != "") {
        echo ('<script> alert("' . $_SESSION['motaErr'] . '") </script>');
      } else if ($_SESSION['soluotxemErr'] != "") {
        echo ('<script> alert("' . $_SESSION['soluotxemErr'] . '") </script>');
      } else if ($_SESSION['ngaylapErr'] != "") {
        echo ('<script> alert("' . $_SESSION['ngaylapErr'] . '") </script>');
      }
      include "./View/hanghoa.php";
      break;
    }
}



?>