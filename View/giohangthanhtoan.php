<div class="table-responsive" style="margin-top:30px;">

    <form action="" method="post">
        <!-- Thông tin sản phầm -->
        <h2 style="color: red; margin-top: 25px;">CHI TIẾT ĐƠN HÀNG</h2>
        <table class="table table-bordered">
            <?php
            $j = 0;
            foreach ($_SESSION['giohang'] as $key => $item):
                $j++;
                ?>
                <tr>
                    <td>
                        <?php echo $j ?>
                    </td>
                    <td>
                        <?php echo $item["name"]; ?>
                    </td>
                    <td>
                        <img style="width: 100%;object-fit: contain;" height="70px" src="Content\hinhanh\<?php echo $item["hinh"]; ?>">
                    </td>
                    <td>
                      <?php echo(date("d/m/Y")) ?>
                    </td>
                    <td>
                        <input type="number" class="form-control" style="width: 40%;" name="newqty[]"
                            value="<?php echo $item["quanty"]; ?>" readonly  /><br />
                    </td>
                    <td>
                        <?php echo number_format($item["cost"]); ?>/ngày
                    </td>
                    <td>
                        <?php echo number_format($item["total"]); ?> <sup><u>đ</u></sup>
                    </td>
                </tr>
                <?php
            endforeach;
            ?>
            <thead>

                <tr class="table-success">
                    <th>Số TT</th>
                    <th>Tên xe </th>
                    <th>Hình ảnh</th>
                    <th>Ngày thuê </th>
                    <th>Số ngày dự kiến thuê </th>
                    <th>Đơn giá </th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
           
        </table>
    </form>
<div style="text-align: right; margin-right: 20px;"> <a href='index.php?action=order'><button class='btn btn-success' style='width: 150px; height: 40px; margin-bottom: 5px;' >THANH TOÁN</button></a> </div>
</div>