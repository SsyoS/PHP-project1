<div <?php if (!isset($_GET['phu']))
   ?>>
  <div class="col-md-4 col-md-offset-4">
    <h3><b>DANH SÁCH CÁC LOẠI XE </b></h3>
  </div>
  <div class="row col-12">
    <?php
$hh = new hanghoa();
if (isset($_SESSION['makh'])) {
  $vaitro = $hh->getdangnhap($_SESSION['makh']);
}
if ($vaitro == 2) {
  echo ('<a href="index.php?phu=addsanpham&action=hanghoa"><button class="btn btn-primary"><h4>Thêm sản phẩm</h4></button></a>');
  echo ('<a href="index.php?phu=dssp&action=hanghoa&act=add1" class="btn btn-primary"><h4>Thêm danh sách sản phẩm</h4></a>');
}
?>

  </div>
  <div class="row">
    <table class="table">
      <thead>
        <tr class="table-primary">
          <th>Mã xe</th>
          <th>Tên xe</th>
          <th>Đơn giá</th>
          <th>Hình</th>
          <th>Nhóm</th>
          <th>Hãng xe</th>
          <th>Loại xe</th>
          <th>Số lượt thuê</th>
          <th>Ngày lập</th>
          <th>Mô tả</th>
          <th>tình trạng</th>
          <th></th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $hh = new hanghoa();
        $result = $hh->getsanpham();
        $count = $result->rowCount();
        $limit = 5;
        $p = new page();
        $page = $p->findPage($count, $limit);
        $start = $p->findStart($limit);
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $result = $hh->getlist($start, $limit);
        while ($set = $result->fetch()):
          ?>
          <tr>
            <td>
              <?php echo $set['maxe'] ?>
            </td>
            <td>
              <?php echo $set['tenxe'] ?>
            </td>
            <td>
              <?php echo $set['dongia'] ?>
            </td>
            <td><img width="50px" height="50px" src="./Content/hinhanh/<?php echo $set['hinh'] ?>" /></td>
            <td>
              <?php echo $set['Nhom'] ?>
            </td>
            <td>
              <?php echo $set['hangxe'] ?>
            </td>
            <td>
              <?php echo $set['loaixe'] ?>
            </td>
            <td>
              <?php echo $set['soluotthue'] ?>
            </td>
            <td>
              <?php echo $set['ngaylap'] ?>
            </td>
            <td style=" width:300px;">
              <?php echo $set['mota'] ?>
            </td>
            <td>
              <?php echo $set['tinhtrang'] ?>
            </td>
            <?php
            if ($vaitro == 2) {

              if (isset($_GET['page'])) {
                $page1 = $_GET['page'];
                echo ('<td><a href="index.php?phu=editsanpham&action=hanghoa&ma=' . $set['maxe'] . '&page=' . $page1 . '"><button class="btn btn-primary">Cập nhật</button></a></td>');


              } else {
                echo ('<td><a href="index.php?phu=editsanpham&action=hanghoa&ma=' . $set['maxe'] . '"><button class="btn btn-primary">Cập nhật</button></a></td>');


              }
              echo ('<td><a href="index.php?phu=addsanpham&action=hanghoa&act=delete&ma=' . $set['maxe'] . '"><button class="btn btn-primary">Xóa</button></a></td>');

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
          echo '<li ><a href="index.php?phu=addsanpham&action=hanghoa&page=' . ($current_page - 1) . '">Prev</a></li>';
        }

        ?>
        <?php
        if (isset($_GET['page'])) {
          for ($i = 1; $i <= $page; $i++) {

            ?>
            <li><a href="index.php?phu=addsanpham&action=hanghoa&page=<?php echo $i; ?>"><?php echo $i ?></a></li>
            <?php
          }
        } else {
          if ($count > $limit) {
            echo ('<li><a href="index.php?phu=addsanpham&action=hanghoa&page=' . $current_page . '">' . $current_page . '</a></li>');
          }
        }

        ?>
        <?php
        if ($current_page < $page && $page > 1) {
          echo '<li ><a href="index.php?phu=addsanpham&action=hanghoa&page=' . ($current_page + 1) . '">next</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
</div>