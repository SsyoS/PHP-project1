<div class="card mt-3">
  <div class="card-header info" style="text-align:center;">
    THÊM DÒNG XE MỚI
  </div>
  <?php
  $hh = new hanghoa();
if (isset($_SESSION['makh'])) {
    $vaitro = $hh->getdangnhap($_SESSION['makh']);
}
  ?>
  <div class="row col-md-4 col-md-offset-4">
    <form action="index.php?phu=addsanpham&action=hanghoa&act=add" method="post" enctype="multipart/form-data">
      <table class="table" style="border: 0px;">
        <tr>
          <?php
          $hh = new hanghoa();
          $result = $hh->getsanpham();
          $count = $result->rowCount();
          ?>
          <td></td>
          <td> <input  style="text-align:center;"type="text" class="form-control" name="maxe" value="số xe hiện có : <?php echo ($count) ?>  "
              readonly /></td>
        </tr>
        <tr>
          <td>Tên xe</td>
          <td><input type="text" <?php if($vaitro==1){  echo('readonly'); } ?> class="form-control" name="tenhh" value="" maxlength="100px" placeholder="<?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_POST['tenhh'] ?>">  <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_SESSION['tenhhErr'] ?></p></td>
        </tr>
        <tr>
          <td>Đơn giá</td>
          <td><input type="number"  <?php if($vaitro==1){  echo('readonly'); } ?> class="form-control" name="dongia" value="" placeholder="<?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_POST['dongia'] ?>"> <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_SESSION['dongiaErr'] ?></p></td>
        </tr>
        <tr>
          <td>Hình</td>
          <td>
            <!-- <label><img width="50px" height="50px" src="./Content/imagetourdien/<?php ?>"></label> -->
            <!-- Chọn file để upload: -->
            <input type="file" name="image" id="fileupload">
            <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_SESSION['hinhErr'] ?></p>
          </td>
        </tr>
        <tr>
          <td> địa điểm</td>
          <td>
            <select name="maloai" class="form-control" style="width:150px;">
              <?php
              $hh = new hanghoa();
              $result = $hh->getmaloai();
              while ($set = $result->fetch()):
                ?>
                <option value="<?php echo ($set['madiadiem']) ?>">

                  <?php
                  echo ($set['tendiadiem'])
                    ?>
                  <?php
              endwhile;

              ?>
              </option>

            </select>
          </td>
        </tr>
        <tr>
          <td>hãng xe</td>
          <td>
            <select name="hangxe" class="form-control" style="width:150px;">
              <?php
              $hh = new hanghoa();
              $result = $hh->gethangxe1();
              while ($set = $result->fetch()):
                ?>
                <option value="<?php echo ($set['mahangxe']) ?>">

                  <?php
                  echo ($set['tenhangxe'])
                    ?>
                  <?php
              endwhile;

              ?>
              </option>

            </select>
          </td>
        </tr>
        <tr>
          <td>loại xe</td>
          <td>
            <select name="loaixe" class="form-control" style="width:150px;">
              <?php
              $hh = new hanghoa();
              $result = $hh->getloaixe1();
              while ($set = $result->fetch()):
                ?>
                <option value="<?php echo ($set['maloaixe']) ?>">

                  <?php
                  echo ($set['tenloaixe'])
                    ?>
                  <?php
              endwhile;

              ?>
              </option>

            </select>
          </td>
        </tr>
        <tr>
          <td>Mô tả</td>
          <td><input type="text" <?php if($vaitro==1){  echo('readonly'); } ?>  class="form-control" name="mota" value="" placeholder="<?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_POST['mota'] ?>"><p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_SESSION['motaErr'] ?></p>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input class="btn btn-success" name="submit" type="submit" value="submit">
          </td>
        </tr>

      </table>
    </form>
  </div>


</div>