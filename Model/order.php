<?php
class order
{
    public function InsertOrder($makh)
    {
        $db = new connect();
        $ngaylap = new DateTime('now');
        $ngaylap = $ngaylap->format('Y-m-d');
        $query = "insert into hoadon1(masohd, makh, ngaydat, tongtien) 
        values (NULL, $makh,'$ngaylap', 0)";
        $db->exec($query);
        $int = $db->getinstance("select masohd from hoadon1 order by masohd desc limit 1");
        return $int[0];
    }
    public function insertOrderDetail($masohd, $maxe, $songaythue,$ngaydat,$ngaytra, $thanhtien)
    {
        $db = new connect();
        $query = "insert into cthoadon1(masohd, maxe, songaythue,ngaydat,ngaytra,thanhtien)  values ('$masohd', '$maxe', '$songaythue','$ngaydat','$ngaytra',$thanhtien)";
        $query1 = "UPDATE  hanghoa SET tinhtrang='1'  where maxe='$maxe'";
        $db->exec($query);
        $db->exec($query1);
    }   


    public function updateTotal($masohd, $total)
    {
        $db = new connect();
        $query = "update hoadon1 set tongtien = $total where masohd = '$masohd'";
        $db->exec($query);
    }

    public function getInfoOrder($masohd)
    {
        $db = new connect();
        $query = "SELECT ct.maxe, ct.songaythue, ct.thanhtien, hh.tenxe, hh.dongia FROM cthoadon1 ct, hoadon1 hd, hanghoa hh WHERE hd.masohd = $masohd AND ct.masohd=hd.masohd AND hh.maxe= ct.maxe";
        $result =  $db->getList($query);
        unset($_SESSION['giohang']);
        return $result;
    }
    public function getInfoKhachhang($masohd)
    {
        $db = new connect();
        $query = "SELECT * FROM hoadon1 hd, khachhang1 kh WHERE hd.makh= kh.makh and masohd=$masohd";
        $result = $db->getinstance($query);
        return $result;
    }
    public function getngaytra($masohd)
    {
        $db = new connect();
        $query = "SELECT ngaytra FROM cthoadon1 WHERE cthoadon1.masohd = $masohd";
        $result = $db->getinstance($query);
        return $result[0];
    }
    
}
