<?php
class connect
{
    public function __construct()
    {
        $dsn='mysql:host=localhost;dbname=shopxe';
        $user='root';
        $pass='';// $pass='root';
        try {
            $this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            // echo "Thanh cong";
        } catch (\Throwable $th) {
            // throw $th;
            // echo "That bai";
        }
    }
    //phương thức thực hiện câu truy vấn select lấy về nhiều object
    public function getList($select)
    {
        # code...
        $result=$this->db->query($select);
        return $result;
    }
    public function getInstance($select){
        $result= $this->db->query($select);
        $result = $result->fetch();
        return $result;
    }
    public function exec($query)
    {
        $result=$this->db->exec($query);
        return $result;
    }
}
