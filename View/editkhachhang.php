<div class="card mt-3">
  <div class="card-header info" style="text-align:center;">
    EDIT khách hàng
  </div>
  <?php
        $makh = $_GET['ma'];
        $result = $hh->getkhachhang($makh);
        while ($set = $result->fetch()):
          ?>
  <div >
    <form action="index.php?action=khachhang&act=update"  method="post">
      <table class="table" style="border: 0px;">
          <tr>
            <td>mã khách hàng</td>
            <td><input type="text" readonly  class="form-control" name="makh"  value="<?php echo($set['makh']); ?>"></td>
          </tr>
          <tr>
            <td>Vai trò</td>
            <td>
              <select name="vaitro"  class="form-control" style="width:150px;">
                <?php
                $hh = new hanghoa();
                $result1 = $hh->getkhachhang1();
                while ($set1 = $result1->fetch()):
                 
                  ?>
                  <option  value="<?php echo ($set1['vaitro']) ?> " <?php if($set1['vaitro']==$set['vaitro']){echo("selected");}?>>

                    <?php
                    if($set1['vaitro']==2){
                      echo ('Admin');
                    }else  if($set1['vaitro']==1){
                      echo ('Quản lý');
                    }else{
                      echo ('Người dùng');
                    }
                  
                      ?>
                    <?php
                endwhile;

                ?>
                </option>

              </select>
            </td>
          </tr>
          <tr>
            <td>tên khách hàng</td>
            <td><input type="text"  class="form-control" name="tenkh"  value="<?php echo($set['tenkh']); ?>"></td>
          </tr>
          <tr>
            <td>tài khoản</td>
            <td><input type="text" readonly class="form-control" name="username"  value="<?php echo($set['username']);?>">
            </td>
          </tr>
          <tr>
            <td>mật khẩu</td>
            <td><input type="text" readonly class="form-control" name="matkhau"  value="<?php echo($set['matkhau']);?>">
            </td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input type="text"  class="form-control" name="email"  value="<?php echo($set['email']);?>">
            </td>
          </tr> 
          <tr>
            <td>địa chỉ</td>
            <td><input type="text"  class="form-control" name="diachi"  value="<?php echo($set['diachi']);?>">
            </td>
          </tr> 
          <tr>
            <td>số điện thoại</td>
            <td><input type="text"  class="form-control" name="sodienthoai"  value="<?php echo($set['sodienthoai']);?>">
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