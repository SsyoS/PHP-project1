<div class="card mt-3">
  <?php
  $hh = new hanghoa();
if (isset($_SESSION['makh'])) {
    $vaitro = $hh->getdangnhap($_SESSION['makh']);
}
  ?>
  <?php if($vaitro==2){  echo('
  <div class="card-header info" style="text-align:center;">
    THÊM ĐỊA ĐIỂM MỚI
  </div>'); } 
  ?>
  <div class="card-body">
    <form action="index.php?phu=adddiadiem&action=diadiem&act=add" method="post">
      <div class="form-group">
        <?php
        $hh = new hanghoa();
        $result = $hh->getnhom();
        $count = $result->rowCount();
        ?>
        <input  style="text-align:center;"type="<?php if($vaitro==2){echo('text');}else{echo('hidden');}?>" readonly  name="maloai" class="form-control" value=" hiện có : <?php echo ($count ) ?>  địa điểm hỗ trợ cho thuê">
      </div>
      <div class="form-group">
      <?php if($vaitro==2){echo('<label for="">ĐỊA ĐIỂM</label>');}?>
        <input type="<?php if($vaitro==2){echo('text');}else{echo('hidden');}?>" name="tenloai"  class="form-control" value='' placeholder="<?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_POST['tenloai'] ?>">
       <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_SESSION['loaiErr'] ?></p>
      </div>
      <div class="form-group">
      <?php if($vaitro==2){echo('
        <button type="submit" class="btn btn-primary">Lưu</button>');}?>
      </div>
    </form>
  </div>
</div>