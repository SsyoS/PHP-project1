<?php
$hh = new hanghoa();
if (!isset($_SESSION['check'])) {
  $_SESSION['check'] = 0;
}
if (isset($_SESSION['makh'])) {
    $vaitro = $hh->getdangnhap($_SESSION['makh']);
}
$result = $hh->getmaloai();
$count = $result->rowCount();
$limit = 5;
$p = new page();
$page = $p->findPage($count, $limit);
$start = $p->findStart($limit);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
?>
<form name="frmloaihang" action="index.php?phu=adddiadiem&action=diadiem&act=xoa"  method="post">
  <div class="card mt-3">
    <div class="card-header" style="text-align:center;">
      QUẢN LÝ ĐỊA ĐIỂM
    </div>
    <div class="card-body">
      <table class="table table-striped table">
        <thead>
          <tr class="bg-info">
            <th scope="col"></th>
            <th scope="col">Mã địa điểm</th>
            <th scope="col">Tên địa điểm</th>
         
            <th scope="col">
              <?php
              if ($current_page > 1 && $page > 1) {
                echo '<a href="index.php?phu=adddiadiem&action=diadiem&page=' . ($current_page - 1) . '"><button type="button" class="btn btn-success">Prev</button></a>';
              }
              if ($current_page < $page && $page > 1) {
                echo '<a href="index.php?phu=adddiadiem&action=diadiem&page=' . ($current_page + 1) . '"><button type="button" class="btn btn-success">next</button></a>';
              }
              ?>  
            </th>

          </tr>
        </thead>  
        <tbody>
          <?php

          $result = $hh->getlistmaloai($start, $limit);
          while ($set = $result->fetch()):

            ?>
            <tr>

              <th scope="row"><input type="checkbox" id="chonX" name="<?php echo ($set['madiadiem']) ?>"
                  value="<?php echo ($set['madiadiem']) ?>" <?php if ($_SESSION['check'] == 1) {
                       echo ("checked");
                     } ?>></th>
              <td>
            
                  <!-- <input type="text" name="ml" value="  <?php echo ($set['madiadiem']) ?> "> -->
                  <?php echo ($set['madiadiem']) ?>
              </td>
              <td>
                <!-- <input type="text" name="tl" value="<?php echo ($set['tendiadiem']) ?>"> -->
                <?php echo ($set['tendiadiem']) ?>
              </td>

              <td>
                <?php
                if($vaitro ==2){
               
                  if (isset($_GET['page'])) {
                    $page1 = $_GET['page'];
                    echo(' <a href="index.php?phu=diadiem&action=diadiem&ma='.$set['madiadiem'] .'&page=' . $page1 . '"
                    class="btn btn-success">Sửa</a>');  
                  } else {
                    echo(' <a href="index.php?phu=diadiem&action=diadiem&ma='.$set['madiadiem'] .'"
                    class="btn btn-success">Sửa</a>');  
      
                  }
                  echo(' <a href="index.php?phu=adddiadiem&action=diadiem&act=delete&ma='.$set['madiadiem'].'"
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
<a href="index.php?phu=adddiadiem&action=diadiem&act=chon" class="btn btn-info">Chọn tất cả</a>
<!-- <button class="btn btn-info" onclick="">Chọn tất cả(javascript)</button> -->
<a href="index.php?phu=adddiadiem&action=diadiem&act=huychon" class="btn btn-info">Bỏ chọn</a>
<button class="btn btn-info" type="submit">Xóa danh mục đã chọn </button>
<a href="index.php?phu=adddiadiem&action=diadiem"><button class="btn btn-info">Thêm địa điểm</button></a>
<!-- <button type="submit" class="btn btn-info">Xoá danh mục đã chọn</button> -->
<a href="index.php?phu=dslsp&action=diadiem" class="btn btn-info">Thêm danh sách địa điểm</a>
</div>');
}
?>
</div>
</form>