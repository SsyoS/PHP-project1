<div class="card mt-3">
  <?php
  $hh = new hanghoa();
if (isset($_SESSION['makh'])) {
    $vaitro = $hh->getdangnhap($_SESSION['makh']);
}
  ?>
  <?php if($vaitro==2){  echo('
  <div class="card-header info" style="text-align:center;">
    THÊM HÃNG XE MỚI
  </div>'); } 
  ?>
  <div class="card-body">
    <form action="index.php?phu=addhangxe&action=hangxe&act=add" method="post">
      <div class="form-group">
        <?php
        $hh = new hanghoa();
        $result = $hh->getnhom();
        $count = $result->rowCount();
        ?>
        <input  style="text-align:center;"type="<?php if($vaitro==2){echo('text');}else{echo('hidden');}?>" readonly  name="mahangxe" class="form-control" value=" hiện có : <?php echo ($count ) ?>  Hãng Xe">
      </div>
      <div class="form-group">
      <?php if($vaitro==2){echo('<label for="">Hãng Xe</label>');}?>
        <input type="<?php if($vaitro==2){echo('text');}else{echo('hidden');}?>" name="hangxe"  class="form-control" value='' placeholder="<?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_POST['hangxe'] ?>">
       <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_SESSION['hangxeErr'] ?></p>
      </div>
      <div class="form-group">
      <?php if($vaitro==2){echo('
        <button type="submit" class="btn btn-primary">Lưu</button>');}?>
      </div>
    </form>
  </div>
</div>