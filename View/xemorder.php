<div class="table-responsive">

  <form action="" method="post">
    <table class="table table-bordered" border="0">

      <tr>
        <td colspan="4">
          <h2 style="color: red;">HÓA ĐƠN</h2>
        </td>
      </tr>
      <tr>
        <td colspan="2">Số Hóa đơn: <?php echo $khDetail['masohd'] ?> </td>
        <td colspan="2"> Ngày lập: <?php echo date_format(new DateTime($khDetail['ngaydat']), "d-m-Y") ?></td>
      </tr>
      <tr>
        <td colspan="2">Họ và tên: <?php echo $khDetail['tenkh'] ?></td>
        <td colspan="2">phí vận chuyển : <?php echo ($_SESSION['phivanchuyen'])?><sup><u>đ</u></sup></td>
      </tr>
      <tr>
      <?php $hh = new hanghoa();
       $giamgia =0;
        $result = $hh->getsotiengiam($masohd);
        while ($set = $result->fetch()) {
          $giamgia=  $set['sotiengiam'];
        }?>
        <td colspan="2">Địa chỉ: <?php echo $khDetail['diachi'] ?> </td>
        <td colspan="2">giảm giá :<?php echo( $giamgia);?><sup><u>đ</u></sup></td>
      </tr>
      <tr>
        <td colspan="2">Số điện thoại: <?php echo $khDetail['sodienthoai'] ?> </td>
        <td > tổng đơn giá :<?php echo number_format($total+ $giamgia-$_SESSION['phivanchuyen']) ?><sup><u>đ</u></sup></td>
      </tr>
      
    </table>
    <!-- Thông tin sản phầm -->
    <table class="table table-bordered">
      <thead>

        <tr class="table-success">
          <th>Số TT</th>  
          <th>Thông Tin Sản Phẩm</th>
          <th>Tùy Chọn Của Bạn</th>
          <th>Giá</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $index = 0;
        while ($set = $orderDetail->fetch()) : //$set[ mahh -> 24, tenhh="....]
        ?>

          <tr>
            <td>
              <?php echo ++$index; ?>
            </td>
            <td> <?php echo $set['tenhh'] ?></td>
            <td> Size: <?php echo $set['size'] ?></td>
            <td>Đơn Giá: <?php
            if ($set['size']=="M") {
              echo (number_format($set['dongia']+20000));
            }else if($set['size']=="L"){
              echo (number_format($set['dongia']+40000));
            }else if($set['size']=="XL"){
              echo (number_format($set['dongia']+60000));
            }else if($set['size']=="XXL"){
              echo (number_format($set['dongia']+80000));
            }else{
              echo (number_format($set['dongia'])."<sup><u>đ</u></sup>");
            }
            
            ?>
            - Số Lượng:<?php echo $set['soluongmua'] ?><br />
            </td>
          </tr>
        <?php endwhile; ?>

        <tr>
          <td colspan="3">
          </td>
     
          <td style="float:right;"> 
          <b> tổng tiền : <?php echo number_format($total) ?><sup><u>đ</u></sup></b></b>
            </td>
   
      </tbody>
    </table>
  </form>

</div>
</div>