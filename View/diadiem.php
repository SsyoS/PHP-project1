<div class="card mt-3">
  <div class="card-header info" style="text-align:center;">
    EDIT địa điểm
  </div>
  <?php
        $mahd = $_GET['ma'];    
        $hh = new hanghoa();
        $result = $hh->getmaloai1($mahd);
        while ($set = $result->fetch()):
          ?>
  <div >
    <form action="index.php?phu=adddiadiem&action=diadiem&act=update&ma=<?php echo ($set['madiadiem']) ?>"  method="post">
      <table class="table" style="border: 0px;">
          <tr>
            <td>mã địa điểm</td>
            <td><input type="text" readonly  name="ml" value="<?php echo ($set['madiadiem']) ?>"></td>
          </tr>
          <tr>
            <td>tên tên địa điểm</td>
            <td><input type="text" name="tenloai" value="<?php echo ($set['tendiadiem']) ?>">   <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_SESSION['loaiErr'] ?></p></td>
          </tr>      
            <td colspan="2" style="text-align: center;">
              <input class="btn btn-success" type="submit"  value="cập nhật">
          <?php
        endwhile;
        ?>
      </table>
    </form>
    
      </div>

</div>