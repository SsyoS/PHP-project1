<div <?php if(!isset($_GET['phu']))?>>
  
<div  class="col-md-4 col-md-offset-4"><h3 ><b>CÁC LOẠI  VOUCHER</b></h3></div>

<div class="row col-12">

<?php
         $hh = new hanghoa();
         if (isset($_SESSION['makh'])) {
           $vaitro = $hh->getdangnhap($_SESSION['makh']);
         }
        ?>
</div>
<div class="row">
<table class="table">
    <thead>
      <tr class="table-primary">
        <th>Mã số voucher</th>
        <th>Tên voucher</th>
        <th>giảm giá</th>
          <th>số lượng voucher còn lại</th>
          <th ></th>
<?php
if($vaitro==2){
  echo('<th><a href="index.php?phu=addvoucher&action=voucher" class="btn btn-primary">thêm voucher</a></th> ');
}
?>
      </tr>
    </thead>
    <tbody>
    <?php 
         $hh = new hanghoa();
         $result = $hh->getvoucher();
         $count = $result->rowCount();
         $limit = 5 ;
         $p = new page();
         $page = $p->findPage($count, $limit);
         $start = $p->findStart($limit);
         $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
         $result = $hh->getlistvoucher( $start , $limit);
         while ($set = $result->fetch()):
        ?>   
      <tr>     
        <td><?php echo $set['masovoucher'] ?></p></td>
        <td><?php echo $set['tenvoucher'] ?></td>
        <td><?php echo $set['giamgia'] ?></td>
        <td style="text-align: center;"><?php echo $set['conlai'] ?></td>
       <?php
       if($vaitro ==2){
        if (isset($_GET['page'])) {
          $page1 = $_GET['page'];
          echo('<td><a href="index.php?phu=editvoucher&action=voucher&ma='.$set['masovoucher'] .'&page='. $page1.'"><button class="btn btn-primary">Cập nhật</button></a></td>');
        } else {
          echo('<td><a href="index.php?phu=editvoucher&action=voucher&ma='.$set['masovoucher'] .'"><button class="btn btn-primary">Cập nhật</button></a></td>');
        } 
       }
       ?>
       
       <?php
        if($vaitro ==2){ 
          echo(' <td><a href="index.php?action=voucher&act=delete&ma='.$set['masovoucher'] .'"><button class="btn btn-primary">Xóa</button></a></td>');
           }
       ?>
      </tr>
     <?php endwhile ?>
    </tbody>
  </table>
  <div class="col-md-6 div col-md-offset-3">
        <ul class="pagination">
            <?php
            if ($current_page > 1 && $page > 1) {
                echo '<li ><a href="index.php?action=voucher&page=' . ($current_page - 1) . '">Prev</a></li>';
            }

            ?>
            <?php
            if (isset($_GET['page'])) {
                for ($i = 1; $i <= $page; $i++) {

                    ?>
                    <li><a href="index.php?action=voucher&page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                    <?php
                }
            } else {
                if($count > $limit){
                echo ('<li><a href="index.php?action=voucher&page=' . $current_page . '">' . $current_page . '</a></li>');
                }
            }

            ?>
            <?php
            if ($current_page < $page && $page > 1) {
                echo '<li ><a href="index.php?action=voucher&page=' . ($current_page + 1) . '">next</a></li>';
            }
            ?>
        </ul>
    </div>
</div>
</div>