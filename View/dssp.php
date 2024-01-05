<div class="card mt-3">
  <?php
  $hh = new hanghoa();
if (isset($_SESSION['makh'])) {
    $vaitro = $hh->getdangnhap($_SESSION['makh']);
}
  ?>
  <div class="card-header info" style="text-align:center;">
    THÊM DÒNG XE MỚI
  </div>
  <div class="card-body">
  <input  style="text-align:center;"type="text" readonly  name="sanpham" class="form-control" value=" số xe hiện có : <?php echo ($count ) ?> ">
    <form action="index.php?phu=addsanpham&action=hanghoa&act=add1"  enctype="multipart/form-data" method="post">
      <label >chọn file csv chứa các dòng xe </label>
    <input type="file" name="file_sanpham" ><BR>
  <button  type="submit" name="submit_file_sanpham"  class="btn btn-primary">submit </button>
  </form>
  </div>
</div>