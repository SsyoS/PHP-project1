<div class="card mt-3">
  <div class="card-header info" style="text-align:center;">
    EDIT SẢN PHẨM
  </div>
  <?php
        $maxe = $_GET['ma'];
        $result = $hh->geteditsanpham($maxe);
        while ($set = $result->fetch()):
          ?>
  <div class="row col-md-4 col-md-offset-4">
    <?php 
    if (isset($_GET['page'])) {
      $page1 = $_GET['page'];
      echo(' <form action="index.php?phu=addsanpham&action=hanghoa&act=update&ma='. $maxe.'&page='.$page1.'" enctype="multipart/form-data" method="post">');
    }else{
echo(' <form action="index.php?phu=addsanpham&action=hanghoa&act=update&ma='.$maxe.'" enctype="multipart/form-data" method="post">');
    }
    ?>
      <table class="table" style="border: 0px;">
       
          <tr>
            <td>Mã xe</td>
            <td> <input type="text" class="form-control" name="maxe" value=" <?php echo ($maxe) ?> " readonly /></td>
          </tr>
          <tr>
            <td>Tên xe</td>
            <td><input type="text" class="form-control" name="tenhh" maxlength="100px" value="<?php echo($set['tenxe']); ?>"></td>
          </tr>
          <tr>
            <td>Đơn giá</td>
            <td><input type="text" class="form-control" name="dongia"  value="<?php echo($set['dongia']); ?>"></td>
          </tr>
          <tr>
            <td>Hình</td>
            <td>
            <input type="hidden" name="imageanh" value="<?php echo($set['hinh']); ?>"  >
              <label><img width="50px" height="50px" src="./Content/hinhanh/<?php echo($set['hinh']); ?>"></label> 
               hình hiện tại : <?php echo($set['hinh']); ?>
              <input type="file" name="image" id="fileupload" >

            </td>
          </tr>
          <tr>
            <td> địa điểm</td>
            <td>
              <select name="maloai" class="form-control" style="width:150px;">
                <?php
                $hh = new hanghoa();
                $result1 = $hh->getmaloai();
                while ($set1 = $result1->fetch()):
                 
                  ?>
                  <option value="<?php echo ($set1['madiadiem']) ?> " <?php if($set1['madiadiem']==$set['Nhom']){echo("selected");}?>>

                    <?php
                    echo ($set1['tendiadiem'])
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
                $result1 = $hh->gethangxe1();
                while ($set1 = $result1->fetch()):
                 
                  ?>
                  <option value="<?php echo ($set1['mahangxe']) ?> " <?php if($set1['mahangxe']==$set['hangxe']){echo("selected");}?>>

                    <?php
                    echo ($set1['tenhangxe'])
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
              <select name="maloaixe" class="form-control" style="width:150px;">
                <?php
                $hh = new hanghoa();
                $result1 = $hh->getloaixe1();
                while ($set1 = $result1->fetch()):
                 
                  ?>
                  <option value="<?php echo ($set1['maloaixe']) ?> " <?php if($set1['maloaixe']==$set['loaixe']){echo("selected");}?>>

                    <?php
                    echo ($set1['tenloaixe'])
                      ?>
                    <?php
                endwhile;

                ?>
                </option>

              </select>
            </td>
          </tr>
          <tr>
            <td>số lượt thuê</td>
            <td><input type="text" class="form-control" name="soluotxem"  value="<?php echo($set['soluotthue']); ?>"></td>
          </tr>
          <tr>
            <td>Ngày lập</td>
            <td><input type="text" class="form-control" name="ngaylap"  value="<?php echo($set['ngaylap']); ?>"></td>
          </tr>
          <tr>
            <td>Mô tả</td>
            <td><input type="text" class="form-control" name="mota"  value="<?php echo($set['mota']);?>">
            </td>
          </tr>
          <tr>
            <td>tình trạng</td>
            <td><input type="text" class="form-control" name="tinhtrang"  value="<?php echo($set['tinhtrang']);?>">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input class="btn btn-success" type="submit"  value="cập nhật">
          <?php
        endwhile;
        ?>
      </table>
    </form>
  </div>


</div>