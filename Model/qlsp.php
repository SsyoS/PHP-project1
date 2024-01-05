<?php
class qlsp
{
    public function __construct()
    {
    }
    function Insertsanpham($tenxe, $dongia, $hinh, $Nhom,$hangxe,$loaixe, $soluotthue, $ngaylap, $mota)
    {
        $db = new connect();
        $query = "insert into hanghoa(maxe,tenxe,dongia,hinh,Nhom,hangxe,loaixe,soluotthue,ngaylap,mota,tinhtrang)
        values(null,'$tenxe',$dongia,'$hinh',$Nhom,$hangxe,$loaixe,$soluotthue,'$ngaylap','$mota','0')";
        $db->exec($query);
    }
    function deletesanpham0($maxe)
    {
        $db = new connect();
        $query1 = "delete from cthoadon1 where maxe='$maxe'";
        $query3 = "delete from binhluan1 where maxe='$maxe'";
        $db->exec($query1);
        $db->exec($query3);
        $hh = new hanghoa();
        $result1 = $hh->getmasohd($maxe);
        while ($set1 = $result1->fetch()) {
            $masohd = $set1['masohd'];
            $item = array(
                'masohd' => $masohd,
            );
            $_SESSION['delete'][] = $item;
        }
    }
    function deletesanpham1($maxe)
    {
        if (isset($_SESSION['delete']) && !empty($_SESSION['delete'])) {
            foreach ($_SESSION['delete'] as $key => $item) {
                $masohd = $_SESSION['delete'][$key]["masohd"];
                $db = new connect();
                $query1 = "delete from cthoadon1 where masohd='$masohd'";
                $query4 = "delete from ctvoucher where masohd='$masohd'";
                $query5 = "delete from hoadon1 where masohd='$masohd'";
                $db->exec($query1);
                $db->exec($query4);
                $db->exec($query5);

            }
            unset($_SESSION['delete']);
        }
    }
    function deletesanpham($maxe)
    {
        $db = new connect();
        $query = "DELETE FROM hanghoa where maxe='$maxe'";
        $db->exec($query);
    }
    function updatesanpham($maxe,$tenhh, $dongia, $hinh, $Nhom,$hangxe,$loaixe, $soluotthue, $ngaylap, $mota,$tinhtrang)
    {
        $db = new connect();
        $query = "UPDATE  hanghoa SET tenxe='$tenhh'  where maxe='$maxe'";
        $query1 = "UPDATE  hanghoa SET  dongia='$dongia'  where maxe='$maxe'";
        $query3 = "UPDATE  hanghoa SET hinh='$hinh'  where maxe='$maxe'";
        $query4 = "UPDATE  hanghoa SET Nhom='$Nhom'  where maxe='$maxe'";
        $query9 = "UPDATE  hanghoa SET hangxe='$hangxe'  where maxe='$maxe'";
        $query10 = "UPDATE  hanghoa SET loaixe='$loaixe'  where maxe='$maxe'";
        $query5 = "UPDATE  hanghoa SET ngaylap='$ngaylap'  where maxe='$maxe'";
        $query6 = "UPDATE  hanghoa SET mota='$mota'  where maxe='$maxe'";
        $query7 = "UPDATE  hanghoa SET soluotthue='$soluotthue'  where maxe='$maxe'";
        $query8 = "UPDATE  hanghoa SET tinhtrang='$tinhtrang'  where maxe='$maxe'";
        $db->exec($query);
        $db->exec($query1);
        $db->exec($query3);
        $db->exec($query4);
        $db->exec($query5);
        $db->exec($query6);
        $db->exec($query7);
        $db->exec($query8);
        $db->exec($query9);
        $db->exec($query10);
    }
}

?>