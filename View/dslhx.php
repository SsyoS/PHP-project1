<div class="card mt-3">
  <?php
  $hh = new hanghoa();
if (isset($_SESSION['makh'])) {
    $vaitro = $hh->getdangnhap($_SESSION['makh']);
}
  ?>
  <div class="card-header info" style="text-align:center;">
    THÊM địa Hãng Xe 
  </div>
  <div class="card-body">
  <input  style="text-align:center;"type="text" readonly  name="hangxe" class="form-control" value=" hiện có : <?php echo ($count ) ?>  địa điểm hổ trợ cho thuê">
    <form action="index.php?phu=addloaisanpham&action=loaisanpham&act=hang"  enctype="multipart/form-data" method="post">
      <label >chọn file csv chứa các Hãng Xe mới</label>
    <input type="file" name="file" ><BR>
  <button  type="submit" name="submit_file"  class="btn btn-primary">submit </button>
  </form>
  </div>
</div>