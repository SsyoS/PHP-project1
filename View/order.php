<div class="table-responsive">

  <form action="" method="post">
    <table class="table table-bordered" border="0">
  
      <tr>
        <td colspan="4">
          <h2 style="color: red; margin-top :25px;">HÓA ĐƠN  
          <!-- -<a href='index.php?action=sanpham' style="margin-left: ;">Quay lại trang chủ</a> -->
        </h2>
        </td>
      </tr>
      <tr>
        <td colspan="2">Số Hóa đơn:
          <?php echo $khDetail['masohd'] ?>
        </td>
        <td colspan="2"> Ngày lập:
          <?php echo date_format(new DateTime($khDetail['ngaydat']), "d-m-Y") ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">Họ và tên:
          <?php echo $khDetail['tenkh'] ?>
        </td>
      </tr>
      <tr>
        <?php $hh = new hanghoa();
        $giamgia = 0;
        $result = $hh->getsotiengiam($masohd);
        while ($set = $result->fetch()) {
          $giamgia = $set['sotiengiam'];
        } ?>
        <td colspan="2">Địa chỉ:
          <?php echo $khDetail['diachi'] ?>
        </td>
        <td colspan="2">giảm giá :
          <?php echo ($giamgia); ?><sup><u>đ</u></sup>
        </td>
      </tr>
      <tr>
        <td colspan="2">Số điện thoại:
          <?php echo $khDetail['sodienthoai'] ?>
        </td>
        <td> tổng đơn giá :
          <?php echo number_format($total + $giamgia) ?><sup><u>đ</u></sup>
        </td>
      </tr>

    </table>
    <!-- Thông tin sản phầm -->
    <table class="table table-bordered">
      <thead>

        <tr class="table-success">
          <th>Số TT</th>
          <th>Thông Tin xe đã đặt </th>
          <th>Tùy Chọn Của Bạn</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $index = 0;
        while ($set = $orderDetail->fetch()):
          ?>

          <tr>
            <td>
              <?php echo ++$index; ?>
            </td>
            <td>
              <?php echo $set['tenxe'] ?>
            </td>
            <td>Đơn Giá:
              <?php
              $hh = new hanghoa();
              echo (number_format($set['thanhtien']));
              ?>
              <sup><u>đ</u></sup>/ngày
              - Số ngày thuê :
              <?php echo $set['songaythue'] ?><br />
            </td>
          </tr>
        <?php endwhile; ?>

        <tr>
          <td colspan="2">
          </td>

          <td style="float:right;">
            <b> tổng tiền :
              <?php echo number_format($total) ?><sup><u>đ</u></sup>
            </b></b>
          </td>

      </tbody>
    </table>
  </form>

</div>
</div>