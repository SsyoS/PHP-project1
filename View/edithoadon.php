<div class="card mt-3">
  <div class="card-header info" style="text-align:center;">
    EDIT hóa đơn
  </div>
  <?php
        $mahd = $_GET['ma'];
        $result = $hh->gethoadon1($mahd);
        while ($set = $result->fetch()):
          ?>
  <div >
    <form action="index.php?phu=edithoadon&action=hoadon&act=update&ma=<?php  echo($set['masohd']);  ?>"  method="post">
      <table class="table" style="border: 0px;">
          <tr>
            <td>mã số hóa đơn</td>
            <td><input type="text" readonly  class="form-control" name="masohd"  value="<?php echo($set['masohd']); ?>"></td>
          </tr>
          <tr>
            <td>mã khách hàng</td>
            <td><input type="text"  readonly class="form-control" name="makh"  value="<?php echo($set['makh']); ?>"></td>
          </tr>
          <tr>
            <td>ngày đặt</td>
            <td><input type="text" <?php if(isset($_GET['act'])=='update')echo('readonly') ?> class="form-control" name="ngaydat"  value="<?php echo($set['ngaydat']);?>">
            <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='update') echo  $_SESSION['ngaydatErr']  ?></p>
            </td>   
          </tr>
          <tr>
            <td>tổng tiền</td>
            <td><input type="text" readonly class="form-control" name="tongtien"  value="<?php echo($set['tongtien']);?>">
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