<?php
class cthoadon
{
    public function __construct()
    {
    }
    function updatecthoadon($masohd, $maxe, $soluongmua, $size, $thanhtien)
    {
        $db = new connect();
        $query = "UPDATE  cthoadon1 SET soluongmua='$soluongmua'  where masohd='$masohd' and maxe = '$maxe'";
        $query1 = "UPDATE  cthoadon1 SET size='$size'  where masohd='$masohd' and maxe = '$maxe'";
        $query2 = "UPDATE  cthoadon1 SET thanhtien='$thanhtien'  where masohd='$masohd' and maxe = '$maxe'";
        $db->exec($query);
        $db->exec($query1);
        $db->exec($query2);
       
    }
    function deletecthoadon($masohd, $maxe)
    {
        $db = new connect();
        $query1 = "delete from cthoadon1 where masohd='$masohd' and maxe = '$maxe'";
        $db->exec($query1);

    }
}

?>