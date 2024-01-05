<?php
class diadiem
{

    function Insertloai($tendiadiem)
    {
        $db = new connect();
        $query = "insert into diadiem(madiadiem,tendiadiem)
    values(null,'$tendiadiem')";
        $db->exec($query);
    }
    function deleteloai($madiadiem)
    {
        $hh = new hanghoa();
        $maxe = 0;
        $masohd = 0;
        $result = $hh->getHangHoa1($madiadiem);

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
    function deleteloai1($madiadiem)
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
    function deleteloai2($madiadiem)
    {
        $db = new connect();
        $query6 = "delete from hanghoa where Nhom='$madiadiem'";
        $db->exec($query6);
       
    }
    function deleteloai3($madiadiem)
    {
        $db = new connect();
        $query7 = "delete from diadiem where madiadiem='$madiadiem'";
        $db->exec($query7);
        unset($_SESSION['delete']);
    }
    function upadteloai($madiadiemmoi, $tendiadiem,$madiadiemcu)
    {
        $db = new connect();
        $query = "UPDATE diadiem SET tendiadiem='$tendiadiem' where madiadiem=$madiadiemcu";
        $query1 = "UPDATE diadiem SET madiadiem='$madiadiemmoi' where madiadiem=$madiadiemcu";
        $db->exec($query);
        $db->exec($query1);
    }


}
?>