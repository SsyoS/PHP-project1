<div class="card mt-3" style="width:100% ;text-align:center;">
    <div class="card-header info" style="text-align:center; background-color: green;">
  Đổi Mật Khẩu
    </div>
    <?php
    $hh = new hanghoa();
    $result = $hh->getkhachhang($_SESSION['makh']);
    while ($set = $result->fetch()):

        ?>
        <div class="row col-md-4 col-md-offset-4">
            <form action="index.php?action=doimatkhau&act=update" method="post">
                <table class="table" style="margin-left:400px;">
                   
                     <input type="hidden" readonly class="form-control" name="makh"
                                value="<?php echo ($set['makh']); ?>">        
                    <input type="hidden"  class="form-control" name="mkc1"
                                value="<?php echo ($set['matkhau']); ?>"> 
                    <tr>
                        <td>Mật Khẩu Cũ</td>
                        <td><input type="password"  class="form-control" name="mkc"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=='update') echo   $_POST['mkc']  ?>">  <p style="color:red">  <?php if(isset($_GET['act']) && $_GET['act']=='update' && $_SESSION['mkcErr']!=="") echo   $_SESSION['mkcErr']  ?></p></td>
                    </tr>
                    <tr>
                        <td>Mật Khẩu Mới</td>
                        <td><input type="text"  class="form-control" name="mkm"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=='update') echo   $_POST['mkm']  ?>">   <p style="color:red">    <?php if(isset($_GET['act']) && $_GET['act']=='update'&&$_SESSION['mkmErr']!=="") echo   $_SESSION['mkmErr']  ?></p></td>
                     
                    </tr>
                    <tr>
                        <td>Nhập lại mật khẩu </td>
                        <td><input type="text"  class="form-control" name="mkl"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=='update') echo   $_POST['mkl']  ?>"> <p style="color:red">    <?php if(isset($_GET['act']) && $_GET['act']=='update'&&$_SESSION['mklErr']!=="") echo   $_SESSION['mklErr']  ?></p></td>
                    </tr>
                    <td colspan="2">
                        <input class="btn btn-success" type="submit" value="đổi mật khẩu">
                        <?php
    endwhile;
    ?>
            </table>
        </form>
    </div>


</div>