<div <?php if(!isset($_GET['phu']))?>>
  
<div  class="col-md-4 col-md-offset-4"><h3 ><b>HÓA ĐƠN</b></h3></div>
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
        <th>Mã số hóa đơn</th>
        <th>Mã khách hàng</th>
        <th>ngày đặt</th>
          <th>tổng tiền</th>
          <th></th>
          <th></th> 
          <th></th>
          <th></th> 
      </tr>
    </thead>
    <tbody>
    <?php 
         $hh = new hanghoa();
         $result = $hh->gethoadon();
         $count = $result->rowCount();
         $limit = 5;
         $p = new page();
         $page = $p->findPage($count, $limit);
         $start = $p->findStart($limit);
         $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
         $result = $hh->getlisthoadon( $start , $limit);
         while ($set = $result->fetch()):
        ?>   
      <tr>     
        <td><?php echo $set['masohd'] ?></td>
        <td><?php echo $set['makh'] ?></td>
        <td><?php echo $set['ngaydat'] ?></td>
        <td><?php echo $set['tongtien'] ?></td>
        <td><a href="index.php?action=cthoadon&ma=<?php echo $set['masohd'] ?>"><button class="btn btn-primary">Xem chi tiết</button></a></td>
       <?php
       if($vaitro ==2){
        if (isset($_GET['page'])) {
          $page1 = $_GET['page'];
          echo('<td><a href="index.php?phu=edithoadon&action=hoadon&ma='.$set['masohd'] .'&page=' . $page1 . '"><button class="btn btn-primary">Cập nhật</button></a></td>');
        } else {
          echo('<td><a href="index.php?phu=edithoadon&action=hoadon&ma='.$set['masohd'] .'"><button class="btn btn-primary">Cập nhật</button></a></td>');
        } 
       }
       ?>
       
       <?php
        if($vaitro ==2){ 
          echo(' <td><a href="index.php?action=hoadon&act=delete&ma='.$set['masohd'] .'"><button class="btn btn-primary">Xóa</button></a></td>');
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
                echo '<li ><a href="index.php?action=hoadon&page=' . ($current_page - 1) . '">Prev</a></li>';
            }

            ?>
            <?php
            if (isset($_GET['page'])) {
                for ($i = 1; $i <= $page; $i++) {

                    ?>
                    <li><a href="index.php?action=hoadon&page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                    <?php
                }
            } else {
                if($count > $limit){
                echo ('<li><a href="index.php?action=hoadon&page=' . $current_page . '">' . $current_page . '</a></li>');
                }
            }

            ?>
            <?php
            if ($current_page < $page && $page > 1) {
                echo '<li ><a href="index.php?action=hoadon&page=' . ($current_page + 1) . '">next</a></li>';
            }
            ?>
        </ul>
    </div>
</div>
</div>