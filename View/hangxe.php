<div class="card mt-3">
  <div class="card-header info" style="text-align:center;">
    EDIT Hãng Xe
  </div>
  <?php
        $mahd = $_GET['ma'];    
        $hh = new hanghoa();
        $result = $hh->gethangxe2($mahd);
        while ($set = $result->fetch()):
          ?>
  <div >
    <form action="index.php?phu=addhangxe&action=hangxe&act=update&ma=<?php echo ($set['mahangxe']) ?>"  method="post">
      <table class="table" style="border: 0px;">
          <tr>
            <td>mã Hãng Xe</td>
            <td><input type="text" readonly  name="mahangxe" value="<?php echo ($set['mahangxe']) ?>"></td>
          </tr>
          <tr>
            <td>tên Hãng xe</td>
            <td><input type="text" name="hangxe" value="<?php echo ($set['tenhangxe']) ?>">   <p style="color: red;"> <?php if(isset($_GET['act']) && $_GET['act']=='add') echo  $_SESSION['hangxeErr'] ?></p></td>
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