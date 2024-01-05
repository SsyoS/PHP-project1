<?php
    class hanghoa
    {
        public function __construct(){}
        public function getHangHoa($nhom)
        {
            $db=new connect();
            $select="SELECT * FROM hanghoa ,diadiem where diadiem.tendiadiem = '$nhom' AND diadiem.madiadiem = hanghoa.Nhom";
            $result=$db->getList($select);
            return $result;
        }
        public function getHangHoa2()
        {
            $db=new connect();
            $select="SELECT * FROM `hanghoa` where  tinhtrang NOT BETWEEN 1 AND 2";
            $result=$db->getList($select);
            return $result;
        }     public function getHangHoatop3()
        {
            $db=new connect();
            $select="SELECT * FROM hanghoa ";
            $result=$db->getList($select);
            return $result;
        }
        public function getHangh($nhom,$hangxe,$loaixe)
        {
            $db=new connect();
            $select="SELECT * FROM hanghoa ,diadiem ,hangxe,loaixe where diadiem.tendiadiem = '$nhom' AND diadiem.madiadiem = hanghoa.Nhom AND hangxe.tenhangxe = '$hangxe' AND hangxe.mahangxe = hanghoa.hangxe AND loaixe.tenloaixe = '$loaixe' AND loaixe.maloaixe = hanghoa.loaixe";
            $result=$db->getList($select);
            return $result;
        }
        public function getHangh1($nhom,$hangxe)
        {
            $db=new connect();
            $select="SELECT * FROM hanghoa ,diadiem ,hangxe where diadiem.tendiadiem = '$nhom' AND diadiem.madiadiem = hanghoa.Nhom  AND hangxe.mahangxe = hanghoa.hangxe AND hangxe.tenhangxe = '$hangxe'";
            $result=$db->getList($select);
            return $result;
        }
        public function getHangHoaall()
        {
            $db=new connect();
            $select="SELECT tendiadiem FROM hanghoa ,diadiem  where  diadiem.madiadiem = hanghoa.Nhom";
            $result = $db->getinstance($select);
            return $result[0];
        }
        public function getHangHoaall1()
        {
            $db=new connect();
            $select="SELECT madiadiem,tendiadiem FROM hanghoa ,diadiem  where  diadiem.madiadiem = hanghoa.Nhom";
            $result=$db->getList($select);
            return $result;
        }
        public function getHangxe()
        {
            $db=new connect();
            $select="SELECT tenhangxe FROM hanghoa ,hangxe  where  hangxe.mahangxe = hanghoa.hangxe";
            $result = $db->getinstance($select);
            return $result[0];
        }
        public function getloaixe()
        {
            $db=new connect();
            $select="SELECT tenloaixe FROM hanghoa ,loaixe  where  loaixe.maloaixe = hanghoa.loaixe";
            $result = $db->getinstance($select);
            return $result[0];
        }
        public function getHangHoa1($nhom)
        {
            $db=new connect();
            $select="SELECT * FROM hanghoa ,diadiem  where diadiem.madiadiem = '$nhom' AND diadiem.madiadiem = hanghoa.Nhom";
            $result=$db->getList($select);
            return $result;
        }
        public function gethanghoaid($id)
        {
            $db=new connect();
            $select="SELECT * FROM hanghoa WHERE maxe=$id";
            $result=$db->getInstance($select);
            return $result;
        } 

        function getCountHH(){
            //kết nối db
            $db = new connect();
            // viết truy vấn
            $select = "SELECT count(*) from`hanghoa ";
            $result = $db->getinstance($select);
            return $result[0];
        }
        function getlistpage($start,$limit,$nhom){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa,diadiem where diadiem.tendiadiem = '$nhom' AND diadiem.madiadiem = hanghoa.Nhom limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        } 
        function getlistpage3($start,$limit){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa where  tinhtrang NOT BETWEEN 1 AND 2 limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }  
        function getlistpage1($start,$limit,$nhom,$hangxe,$loaixe){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa,diadiem ,hangxe,loaixe where diadiem.tendiadiem = '$nhom' AND diadiem.madiadiem = hanghoa.Nhom AND hangxe.tenhangxe = '$hangxe' AND hangxe.mahangxe = hanghoa.hangxe AND loaixe.tenloaixe = '$loaixe' AND loaixe.maloaixe = hanghoa.loaixe limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }   
        function getlistpage2($start,$limit,$nhom,$hangxe){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa,diadiem ,hangxe where diadiem.tendiadiem = '$nhom' AND diadiem.madiadiem = hanghoa.Nhom AND hangxe.tenhangxe = '$hangxe' AND hangxe.mahangxe = hanghoa.hangxe   limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }   
        function getlistbinhluan($start,$limit,$id){
            $db = new connect();
            // viết truy vấn
            $select="SELECT  mabl,tenkh ,maxe,username,ngaybl,noidung, solike,sodislike FROM binhluan1 bl ,khachhang1 kh WHERE  bl.makh=kh.makh and maxe='$id' limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }   
        public function getbl($id)
        {
            $db=new connect();
            $select="SELECT  mabl ,tenkh,maxe,username,ngaybl,noidung ,solike,sodislike FROM binhluan1 bl ,khachhang1 kh WHERE  bl.makh=kh.makh and maxe='$id'";
            $result=$db->getList($select);
            return $result;
        }
        
        public function getvoucher()
        {
            $db=new connect();
            $select="SELECT * FROM `voucher` ";
            $result=$db->getList($select);
            return $result;
        }
        public function getvoucher1($masovoucher)
        {
            $db=new connect();
            $select="SELECT * FROM `voucher` where masovoucher = '$masovoucher'";
            $result=$db->getList($select);
            return $result;
        }
        public function getctvoucher($masovoucher)
        {
            $db=new connect();
            $select="SELECT * FROM `ctvoucher` where masovoucher = '$masovoucher'";
            $result=$db->getList($select);
            return $result;
        }
        function getlistvoucher($start,$limit){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT masovoucher,tenvoucher,giamgia,conlai,DKSD FROM `voucher` limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }   
        public function getsotiengiam($masohd)
        {
            $db=new connect();
            $select="SELECT  * FROM ctvoucher where masohd='$masohd'";
            $result=$db->getList($select);
            return $result;
        }
        public function getnhom()
        {
            $db=new connect();
            $select="SELECT * FROM diadiem  ";
            $result=$db->getList($select);
            return $result;
        }
        public function gethangxe0()
        {
            $db=new connect();
            $select="SELECT * FROM hangxe  ";
            $result=$db->getList($select);
            return $result;
        }
        function getlistnhom($start,$limit){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT tendiadiem  FROM diadiem limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }  
        public function getmaloai()
        {
            $db=new connect();
            $select="SELECT madiadiem,tendiadiem FROM diadiem ";
            $result=$db->getList($select);
            return $result;
        }
        public function gethangxe1()
        {
            $db=new connect();
            $select="SELECT mahangxe,tenhangxe FROM hangxe ";
            $result=$db->getList($select);
            return $result;
        }
        public function gethangxe2($mahangxe)
        {
            $db=new connect();
            $select="SELECT mahangxe,tenhangxe FROM hangxe where mahangxe = '$mahangxe' ";
            $result=$db->getList($select);
            return $result;
        }
        public function getloaixe1()
        {
            $db=new connect();
            $select="SELECT maloaixe,tenloaixe FROM loaixe ";
            $result=$db->getList($select);
            return $result;
        }
        public function getmaloai1($madiadiem)
        {
            $db=new connect();
            $select="SELECT madiadiem,tendiadiem FROM diadiem where madiadiem = '$madiadiem'";
            $result=$db->getList($select);
            return $result;
        }
        function getlist($start,$limit){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa  limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        } 
        
        function getsanpham(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa   ";
            $result = $db->getList($select);
            return $result;
        } 
        function geteditsanpham($maxe){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa Where maxe='$maxe'  ";
            $result = $db->getList($select);
            return $result;
        } 
        public function getlistmaloai($start,$limit)
        {
            $db=new connect();
            $select="SELECT madiadiem,tendiadiem FROM diadiem limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        public function getlisthangxe($start,$limit)
        {
            $db=new connect();
            $select="SELECT mahangxe,tenhangxe FROM hangxe limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        function getdangnhap($makh){
            //kết nối db
            $db = new connect();
            // viết truy vấn
            $select = "SELECT vaitro from`khachhang1` where makh='$makh'";
            $result=$db->getInstance($select);
            return $result[0];
        }
        function getkhachhang($makh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from khachhang1 Where makh='$makh'";
            $result = $db->getList($select);
            return $result;
        } 
        public function getmasohd($maxe)
        {
            $db=new connect();
            $select="SELECT * FROM cthoadon1  where maxe=$maxe";
            $result=$db->getList($select);
            return $result;
        }
        function gethoadon(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hoadon1 ";
            $result = $db->getList($select);
            return $result;
        } 
        public function getlisthoadon($start,$limit)
        {
            $db=new connect();
            $select="SELECT * FROM hoadon1 limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        function gethoadon1($masohd){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hoadon1 where masohd = $masohd";
            $result = $db->getList($select);
            return $result;
        } 
        function getcthoadon($masohd){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from cthoadon1 where masohd = $masohd";
            $result = $db->getList($select);
            return $result;
        } 
        function getcthoadon1($masohd,$maxe){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from cthoadon1 where masohd = $masohd and  maxe=$maxe";
            $result = $db->getList($select);
            return $result;
        } 
        public function getlistcthoadon($start,$limit,$masohd)
        {
            $db=new connect();
            $select="SELECT * FROM cthoadon1 where masohd=$masohd limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        function getskhachhang1(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from khachhang1   ";
            $result = $db->getList($select);
            return $result;
        } 
        public function getlistkhachhang($start,$limit)
        {
            $db=new connect();
            $select="SELECT * FROM khachhang1  limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        function getkhachhang1(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT DISTINCT vaitro from khachhang1   ";
            $result = $db->getList($select);
            return $result;
        } 
        function getbinhluan1($makh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from binhluan1 where makh = $makh";
            $result = $db->getList($select);
            return $result;
        } 
        function getctvoucher1($makh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from ctvoucher where makh = $makh";
            $result = $db->getList($select);
            return $result;
        } 
 
        function gethd1($makh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT  cthoadon1.masohd FROM hoadon1 ,cthoadon1 WHERE hoadon1.masohd = cthoadon1.masohd and makh =$makh";
            $result = $db->getList($select);
            return $result;
        } 
        function getsl($masovoucher){
            //kết nối db
            $db = new connect();
            // viết truy vấn
            $select = "SELECT conlai from`voucher` where masovoucher='$masovoucher'";
            $result=$db->getInstance($select);
            return $result[0];
        }
        function getThongKeHangHoa(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT a.tenhh,sum(b.soluongmua) as soluong from hanghoa a, cthoadon1  b where a.maxe=b.maxe group by a.tenhh";
            $result = $db->getList($select);
            return $result;
        } 
        function getThongKeHangHoa1($soluong){
            $db = new connect();
            // viết truy vấn
            $date = getdate();
            $ngaylap =$date['year']."-".$date['mon']."-".$date['mday']; 
            $ngaylap1 =$date['year']."-".$date['mon']."-".$date['mday']-$soluong;      
            $select = "SELECT a.tenhh,sum(b.soluongmua) as soluong from hanghoa a, cthoadon1  b, hoadon1 C where a.maxe=b.maxe AND b.masohd = c.masohd AND C.ngaydat  BETWEEN '$ngaylap1' AND ' $ngaylap'  group by a.tenhh";
            $result = $db->getList($select);
            return $result;
        } 
        function getThongKeHangHoa2($soluong){
            $db = new connect();
            // viết truy vấn
            $date = getdate();
            $ngaylap =$date['year']."-".$date['mon']."-".$date['mday']; 
            $ngaylap1 =$date['year']."-".$date['mon']-$soluong."-".$date['mday'];      
            $select = "SELECT a.tenhh,sum(b.soluongmua) as soluong from hanghoa a, cthoadon1  b, hoadon1 C where a.maxe=b.maxe AND b.masohd = c.masohd AND C.ngaydat  BETWEEN '$ngaylap1' AND ' $ngaylap'  group by a.tenhh";
            $result = $db->getList($select);
            return $result;
        } 
        function getThongKeHangHoa3($soluong){
            $db = new connect();
            // viết truy vấn
            $date = getdate();
            $ngaylap =$date['year']."-".$date['mon']."-".$date['mday']; 
            $ngaylap1 =$date['year']-$soluong."-".$date['mon']."-".$date['mday'];      
            $select = "SELECT a.tenhh,sum(b.soluongmua) as soluong from hanghoa a, cthoadon1  b, hoadon1 C where a.maxe=b.maxe AND b.masohd = c.masohd AND C.ngaydat  BETWEEN '$ngaylap1' AND ' $ngaylap'  group by a.tenhh";
            $result = $db->getList($select);
            return $result;
        } 

        function gettien($masohd){
            //kết nối db
            $db = new connect();
            // viết truy vấn
            $select = "SELECT sum(thanhtien) FROM `cthoadon1` WHERE masohd = $masohd";
            $result=$db->getInstance($select);
            return $result[0];
        }
        function getmhd($maxe){
            //kết nối db
            $db = new connect();
            // viết truy vấn
            $select = " SELECT DISTINCT cthoadon1.masohd FROM cthoadon1,hoadon1 where maxe =$maxe";
            $result = $db->getList($select);
            return $result;
        }
        
    }
   
?>