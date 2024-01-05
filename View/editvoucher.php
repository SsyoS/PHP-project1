<div class="card mt-3">
  <div class="card-header info" style="text-align:center;">
    EDIT voucher
  </div>
  <?php
        $mavoucher = $_GET['ma'];
        $result = $hh->getvoucher1($mavoucher);
        while ($set = $result->fetch()):
          ?>
  <div >
    <form action="index.php?phu=editvoucher&action=voucher&act=update&ma=<?php  echo($set['masovoucher']);  ?>"  method="post">
      <table class="table" style="border: 0px;">
          <tr>
            <td>mã số voucher</td>
            <td><input type="text" readonly  class="form-control" name="masovoucher"  value="<?php echo($set['masovoucher']); ?>"></td>
          </tr>
          <tr>
            <td>tên voucher</td>
            <td><input type="text"  class="form-control" name="tenvoucher"  value="<?php echo($set['tenvoucher']); ?>"></td>
          </tr>
          <tr>
            <td>giảm giá</td>
            <td><input type="number" class="form-control" name="giamgia"  value="<?php echo($set['giamgia']);?>">
            </td>
          </tr>
          <tr>
            <td>số lượng voucher</td>
            <td><input type="number"  class="form-control" name="conlai"  value="<?php echo($set['conlai']);?>">
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;">
              <input class="btn btn-success" type="submit"  value="cập nhật">
          <?php
        endwhile;
        ?>
      </table>
    </form>
  </div>


</div>