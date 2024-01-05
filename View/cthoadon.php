<div <?php if (!isset($_GET['phu']))
 ?>>
<?php
 $hh = new hanghoa();
 if (isset($_SESSION['makh'])) {
   $vaitro = $hh->getdangnhap($_SESSION['makh']);
 }
?>
    <div >
      <h3 style="text-align: center;"><b> CHI TIẾT HÓA ĐƠN</b></h3>
    </div>
    <div class="row col-12">

    </div>
    <div class="row">
      <table class="table">
        <thead>
          <tr class="table-primary">
            <th>Mã số hóa đơn</th>
            <th>Mã xe</th>
            <th>số ngày thuê</th>
            <th>ngày nhận </th>
            <th>ngày trả </th>
            <th>thành tiền</th>
            <th></th>
         
            <td><a href="index.php?action=hoadon"><button
                  class="btn btn-success">back</button></a></td>
          </tr>
        </thead>
        <tbody>
        <?php
$hh = new hanghoa();
$mahd = $_GET['ma'];
$result = $hh->getcthoadon($mahd);
$count = $result->rowCount();
$limit = 5;
$p = new page();
$page = $p->findPage($count, $limit);
$start = $p->findStart($limit);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$result = $hh->getlistcthoadon($start, $limit,$mahd);
while ($set = $result->fetch()):
  ?>
          <tr>
            <td>
              <?php echo $set['masohd'] ?>
            </td>
            <td>
              <?php echo $set['maxe'] ?>
            </td>
            <td>
              <?php echo $set['songaythue'] ?>
            </td>
            <td>
              <?php echo $set['ngaydat'] ?>
            </td>
            <td>
              <?php echo $set['ngaytra'] ?>
            </td>
            <td>
              <?php echo $set['thanhtien'] ?>
            </td>
            <?php if($vaitro==2){
echo('<td><a href="index.php?phu=editcthoadon&action=cthoadon&ma='. $set['masohd'] .'&maxe='. $set['maxe'].'"><button
class="btn btn-primary">Cập nhật</button></a></td>               
<td><a href="index.php?&action=cthoadon&act=delete&ma='. $set['masohd'] .'&maxe='. $set['maxe'].'"><button class="btn btn-primary">Xóa</button></a></td>');
            } ?>         
          </tr>
        <?php endwhile ?>
      </tbody>
    </table>
    <div class="col-md-6 div col-md-offset-3">
        <ul class="pagination">
            <?php
            if ($current_page > 1 && $page > 1) {
                echo '<li ><a href="index.php?action=cthoadon&ma='.$mahd.'&page=' . ($current_page - 1) . '">Prev</a></li>';
            }

            ?>
            <?php
            if (isset($_GET['page'])) {
                for ($i = 1; $i <= $page; $i++) {

                    ?>
                    <li><a href="index.php?action=cthoadon&ma=<?php echo($mahd)?>&page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                    <?php
                }
            } else {
                if($count > $limit){
                echo ('<li><a href="index.php?action=cthoadon&ma='.$mahd.'&page=' . $current_page . '">' . $current_page . '</a></li>');
                }
            }

            ?>
            <?php
            if ($current_page < $page && $page > 1) {
                echo '<li ><a href="index.php?action=cthoadon&ma='.$mahd.'&page=' . ($current_page + 1) . '">next</a></li>';
            }
            ?>
        </ul>
    </div>
  </div>
</div>