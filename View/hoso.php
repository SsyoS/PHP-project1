<div class="card mt-3" style="width:100% ;text-align:center;">
  <div class="card-header info" style="text-align:center; background-color: green;">
    EDIT hồ sơ
  </div>
  <?php
  $hh = new hanghoa();
        $result = $hh->getkhachhang($_SESSION['makh']);
        while ($set = $result->fetch()):
          ?>
  <div class="row col-md-4 col-md-offset-4">
    <form action="index.php?action=hoso&act=update" method="post">
      <table class="table" style="margin-left:400px;">
          <tr>
            <td>ID khách hàng</td>
            <td> <input type="text" class="form-control" name="makh" value=" <?php echo ($_SESSION['makh']) ?> " readonly />
          </td>
          </tr>
          <tr>
            <td>Tên khách hàng</td>
            <td><input type="text" class="form-control" name="tenkh" maxlength="100px" value="<?php echo($set['tenkh']); ?>">
            <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='update'&& isset($_SESSION['tenhsErr'])!="") echo  $_SESSION['tenhsErr'] ?></p>     
          </td>
          </tr>
         
          
          <tr>
            <td>Email</td>
            <td><input type="text" class="form-control" name="email"  value="<?php echo($set['email']); ?>">
            <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='update'&& isset($_SESSION['emailhsErr'])!="") echo  $_SESSION['emailhsErr']  ?></p> 
          </td>
          </tr>
          <tr>
            <td>địa chỉ</td>
            <td><input type="text" class="form-control" name="dc"  value="<?php echo($set['diachi']); ?>">
            <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='update'&& isset($_SESSION['diachihsErr'])!="") echo  $_SESSION['diachihsErr']  ?></p>
          </td>
          </tr>
          <tr>
            <td>số điện thoại</td>
            <td><input type="text" class="form-control" name="sdt"  value="<?php echo($set['sodienthoai']);?>">
            <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='update' && isset($_SESSION['phonehsErr'])!="") echo   $_SESSION['phonehsErr']  ?></p>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input class="btn btn-success" type="submit" value="cập nhật">
          <?php
        endwhile;
        ?>
      </table>
    </form>
  </div>


</div>