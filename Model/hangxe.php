<?php
class hangxe
{

    function Insertloai($tenhangxe)
    {
        $db = new connect();
        $query = "insert into hangxe(mahangxe,tenhangxe)
    values(null,'$tenhangxe')";
        $db->exec($query);
    }
    function deleteloai($mahangxe)
    {
        $hh = new hanghoa();
        $maxe = 0;
        $masohd = 0;
        $result = $hh->getHangHoa1($mahangxe);

        while ($set = $result->fetch()) {
            $maxe = $set['maxe'];
            // echo ($maxe);
            $result1 = $hh->getmasohd($maxe);
            $db = new connect();
            $query1 = "delete from cthoadon1 where maxe='$maxe'";
            $query3 = "delete from binhluan1 where maxe='$maxe'";
            $db->exec($query1);
            $db->exec($query3);
            while ($set1 = $result1->fetch()) {
                $masohd = $set1['masohd'];
                $item = array(
                    'masohd' => $masohd,
                );
                $_SESSION['delete'][] = $item;
            }
        }
    }
    function deleteloai1($mahangxe)
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
    function deleteloai2($mahangxe)
    {
        $db = new connect();
        $query6 = "delete from hanghoa where Nhom='$mahangxe'";
        $db->exec($query6);
       
    }
    function deleteloai3($mahangxe)
    {
        $db = new connect();
        $query7 = "delete from hangxe where mahangxe='$mahangxe'";
        $db->exec($query7);
        unset($_SESSION['delete']);
    }
    function upadteloai($mahangxemoi, $tenhangxe,$mahangxecu)
    {
        $db = new connect();
        $query = "UPDATE hangxe SET tenhangxe='$tenhangxe' where mahangxe=$mahangxecu";
        $query1 = "UPDATE hangxe SET mahangxe='$mahangxemoi' where mahangxe=$mahangxecu";
        $db->exec($query);
        $db->exec($query1);
    }


}
?>