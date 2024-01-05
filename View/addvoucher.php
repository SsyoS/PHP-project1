<div class="card mt-3">
  <div class="card-header info" style="text-align:center;">
 thêm chương trình giảm giá mới
  </div>
  <?php
        $hh = new hanghoa();
        $result = $hh->getvoucher();
        $count = $result->rowCount();
        ?>
  <div >
  <form action="index.php?phu=addvoucher&action=voucher&act=them"  method="post">
      <table class="table" style="border: 0px;">
          <tr>
            <td>số voucher hiện có</td>
            <td><input type="text" readonly  class="form-control" name="masovoucher"  value="<?php echo($count) ?>"></td>
          </tr>
          <tr>
            <td>tên voucher</td>
            <td><input type="text"  class="form-control" name="tenvoucher"  value="" placeholder="<?php if(isset($_GET['act']) && $_GET['act']=='them') echo  $_POST['tenvoucher'] ?>" ><p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='them') echo  $_SESSION['tenvoucherErr'] ?></td>
          </tr>
          <tr>
            <td>số tiền giảm giá</td>
            <td><input type="number" class="form-control" name="giamgia"  value="" placeholder="<?php if(isset($_GET['act']) && $_GET['act']=='them') echo  $_POST['giamgia'] ?>"><p style="color: red;"  > <?php if(isset($_GET['act']) && $_GET['act']=='them') echo  $_SESSION['giamgiavcErr'] ?>
            </td>
          </tr>
          <tr>
            <td>số lượng voucher</td>
            <td><input type="number"  class="form-control" name="conlai"  value="" placeholder="<?php if(isset($_GET['act']) && $_GET['act']=='them') echo  $_POST['conlai'] ?>"><p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='them') echo  $_SESSION['conlaiErr'] ?>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;">
              <input class="btn btn-success" type="submit"  value="Submit">
         
      </table>
    </form>
  </div>


</div>