<?php
$hh = new hanghoa();
if (!isset($_SESSION['check'])) {
  $_SESSION['check'] = 0;
}
if (isset($_SESSION['makh'])) {
    $vaitro = $hh->getdangnhap($_SESSION['makh']);
}
$result = $hh->gethangxe1();
$count = $result->rowCount();
$limit = 5;
$p = new page();
$page = $p->findPage($count, $limit);
$start = $p->findStart($limit);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
?>
<form name="frmloaihang" action="index.php?phu=addhangxe&action=hangxe&act=xoa"  method="post">
  <div class="card mt-3">
    <div class="card-header" style="text-align:center;">
      QUẢN LÝ Hãng xe
    </div>
    <div class="card-body">
      <table class="table table-striped table">
        <thead>
          <tr class="bg-info">
            <th scope="col"></th>
            <th scope="col">Mã Hãng xe</th>
            <th scope="col">Tên Hãng Xe</th>
         
            <th scope="col">
              <?php
              if ($current_page > 1 && $page > 1) {
                echo '<a href="index.php?phu=addhangxe&action=hangxe&page=' . ($current_page - 1) . '"><button type="button" class="btn btn-success">Prev</button></a>';
              }
              if ($current_page < $page && $page > 1) {
                echo '<a href="index.php?phu=addhangxe&action=hangxe&page=' . ($current_page + 1) . '"><button type="button" class="btn btn-success">next</button></a>';
              }
              ?>  
            </th>

          </tr>
        </thead>  
        <tbody>
          <?php

          $result = $hh->getlisthangxe($start, $limit);
          while ($set = $result->fetch()):

            ?>
            <tr>

              <th scope="row"><input type="checkbox" id="chonX" name="<?php echo ($set['mahangxe']) ?>"
                  value="<?php echo ($set['mahangxe']) ?>" <?php if ($_SESSION['check1'] == 1) {
                       echo ("checked");
                     } ?>></th>
              <td>
            
                  <!-- <input type="text" name="ml" value="  <?php echo ($set['mahangxe']) ?> "> -->
                  <?php echo ($set['mahangxe']) ?>
              </td>
              <td>
                <!-- <input type="text" name="tl" value="<?php echo ($set['tenhangxe']) ?>"> -->
                <?php echo ($set['tenhangxe']) ?>
              </td>

              <td>
                <?php
                if($vaitro ==2){
               
                  if (isset($_GET['page'])) {
                    $page1 = $_GET['page'];
                    echo(' <a href="index.php?phu=hangxe&action=hangxe&ma='.$set['mahangxe'] .'&page=' . $page1 . '"
                    class="btn btn-success">Sửa</a>');  
                  } else {
                    echo(' <a href="index.php?phu=hangxe&action=hangxe&ma='.$set['mahangxe'] .'"
                    class="btn btn-success">Sửa</a>');  
      
                  }
                  echo(' <a href="index.php?phu=addhangxe&action=hangxe&act=delete&ma='.$set['mahangxe'].'"
                  class="btn btn-warning">Xoá</a>');
                }
                ?>                     
              </td>
            </tr>
  <?php
          endwhile
          ?>
<input type="hidden" name="xoa" value="" />
</tbody>
</table>
</div>

<?php

if($vaitro ==2){
  echo('<div class="card-footer">
<a href="index.php?phu=addhangxe&action=hangxe&act=chon" class="btn btn-info">Chọn tất cả</a>
<!-- <button class="btn btn-info" onclick="">Chọn tất cả(javascript)</button> -->
<a href="index.php?phu=addhangxe&action=hangxe&act=huychon" class="btn btn-info">Bỏ chọn</a>
<button class="btn btn-info" type="submit">Xóa danh mục đã chọn </button>
<a href="index.php?phu=addhangxe&action=hangxe"><button class="btn btn-info">Thêm địa điểm</button></a>
<!-- <button type="submit" class="btn btn-info">Xoá danh mục đã chọn</button> -->

</div>');
}
// <a href="index.php?phu=dslsp&action=hangxehangxe" class="btn btn-info">Thêm danh sách địa điểm</a>
?>
</div>
</form>