<style>
.ttmgg {
    color: #198754;
}

.ttmgg:hover {
    color: #5fcf86;
    text-decoration: none;
}
</style>
<span class="container" style="margin-top:10px;">
    <?php
    $hh = new hanghoa();
    $result = $hh->getvoucher();
    $count = $result->rowCount();
    $limit = 5;
    $p = new page();
    $pagevoucher = $p->findPage($count, $limit);
    $start = $p->findStartvoucher($limit);
    $current_page_voucher = isset($_GET['pagevoucher']) ? $_GET['pagevoucher'] : 1;
    ?>
    <div style="text-align: center; margin-top :25px;">
        <h3>--- GIỎ HÀNG ---</h3>
        <div class="table-responsive">
            <?php
            if (!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0):

                echo ("  <table class='table table-bordered'>
                    <tr class='table-success'>
                    <th>Số TT</th>
                    <th>Thông Tin </th>
                    <th>Hình ảnh </th>
                    <th>Số ngày thuê</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                        <th>    <a href='index.php?action=thuthapmagiamgia' class='ttmgg'>Thu thập mã giảm
                        giá</a> <a href='index.php?action=sanpham' class='btn btn-success'>back</a></th>
                    </tr>
                   
                </table>");
                echo '  <p>Không có sản phẩm trong giỏ hàng</p>';
                ?>
            <?php else:
                ?>
            <form action="index.php?action=giohang&act=update_item" method="post">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-success">
                            <th>Số TT</th>
                            <th>Thông Tin </th>
                            <th>Hình ảnh </th>
                            <th>Số ngày thuê</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th>
                                <a href="index.php?action=thuthapmagiamgia" class="ttmgg">Thu thập mã giảm
                                    giá</a>
                                <a href='index.php?action=sanpham' class='btn btn-success'>back</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $j = 0;
                            foreach ($_SESSION['giohang'] as $key => $item):
                                $j++;
                                ?>
                        <tr>
                            <td>
                                <?php echo $j; ?>
                            </td>
                            <td>
                                <?php echo $item["name"]; ?>
                            </td>
                            <td>
                                <img style="width: 100%;" height="70px"
                                    src="Content\hinhanh\<?php echo $item["hinh"]; ?>">
                            </td>
                            <td>
                                <input type="number" class="form-control" style="width: 100%;" name="newqty[]"
                                    value="<?php echo $item["quanty"]; ?>" /><br />
                            </td>
                            <td>
                                <?php echo number_format($item["cost"]); ?>/ngày
                            </td>
                            <td>
                                <?php echo number_format($item["total"]); ?> <sup><u>đ</u></sup>
                            </td>
                            <td>
                                
                                <button type="sumit" class="btn btn-primary">Sửa</button>
                                <a href="index.php?action=giohang&act=delete_item&id=<?php echo $key ?>">
                                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></a>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                            ?>

                    </tbody>
                </table>
            </form>
            <?php
            endif;
            ?>
        </div>

        <?php

        if (isset($_GET['voucher']) && isset($_SESSION['makh'])) {
            echo ('<table border="1">
        <tr>

        <td style="width:50%;">CÁC  VOUCHER CỦA BẠN</td>
        <td style="width:50%;">số tiền giảm</td>');
            ?>
        <td style="width:100%;">
            <?php
                if (!isset($_GET['ma'])) {
                    if ($current_page_voucher > 1 && $pagevoucher > 1) {
                        echo '<a href=" index.php?action=giohang&voucher&pagevoucher=' . ($current_page_voucher - 1) . '"><button class="btn btn-primary" style="width:60%;">Prev</button></a>';
                    }
                    if ($current_page_voucher < $pagevoucher && $pagevoucher > 1) {
                        echo '<a href=" index.php?action=giohang&voucher&pagevoucher=' . ($current_page_voucher + 1) . '"><button class="btn btn-primary" style="width:60%;">next</button></a>';
                    }
                }
                ?>
        </td>
        <?php
            echo ('   
        </tr>');

            ?>
        <?PHP
            $i = 0;
            $result = $hh->getlistvoucher($start, $limit);
            while ($set = $result->fetch()):
                if ($set["conlai"] != 0) {
                    if (isset($_SESSION['magiamgia'])) {
                        if ($_SESSION['magiamgia'] == $set["masovoucher"]) {
                            $_SESSION['tiengiamgia'] = $set["giamgia"];
                            echo ('   <tr>
        <td>
             ' . $set["tenvoucher"] . '
        </td>
        <td>
           ' . number_format($set["giamgia"]) . '<u>đ</u>
        </td>
        <td><a href="index.php?action=giohang&voucher&act=xoa"> <button class="btn btn-success">Đang sử dụng</button>
        </tr>x
        ');
                        }
                    } else {
                        echo ('   <tr>
            <td>
                 ' . $set["tenvoucher"] . '
            </td>
            <td>
               ' . number_format($set["giamgia"]) . '<u>đ</u>
            </td>
            <td> <a href="index.php?action=giohang&act=khuyenmai&voucher&pagevoucher=' . ($current_page_voucher) . '&ma=' . $set['masovoucher'] . '"><button class="btn btn-info">Sử dụng</button> </a></td>
            </tr>
            ');
                    }
                }
            endwhile;
            echo (' </table>');

        }
        ?>
        <?php
        if (isset($_GET['voucher'])) {
            echo ('     <a  href="index.php?action=sanpham">  <button type="button" class="btn btn-outline-success" style="width: 100%; margin-top: 5px;">Sử dụng
    VOUCHER</button></a>  ');
        } else {
            echo ('  <a  href="index.php?action=giohang&voucher">  <button type="button" class="btn btn-outline-success" style="width: 100%; margin-top: 5px;">Sử dụng
    VOUCHER</button></a> ');
        }
        ?>

    </div>



    <div class="row">
        <div class="col-lg-5" style="text-align:left ;">
            <h4>Đơn giá</h4>
            <h4>Giảm K.Mại</h4>
            <h4>Tổng</h4>
        </div>
        <div class="col-lg-2" style="text-align:right ;">

        </div>
        <div class="col-lg-5" style="text-align:right ;">
            <h4>
                <?php
                $gh = new giohang();
                $gettotal = $gh->getTotal();
                echo number_format($gettotal); ?><u>đ</u>
            </h4>
            <h4 style="color: red;">
                <?php
                if ((!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0)) {

                    echo number_format(0);
                } else {
                    if (isset($_SESSION['tiengiamgia'])) {
                        echo (number_format($_SESSION['tiengiamgia']));
                    }
                    echo number_format(0);
                }
                ?> <u>đ</u>
            </h4>

            <h4>
                <?php
                $gettotal = $gh->getTotal();
                if (!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0) {

                    echo number_format($gettotal);
                } else {
                    if (isset($_SESSION['tiengiamgia'])) {
                        echo number_format($gettotal - $_SESSION['tiengiamgia']);
                    } else {
                        echo number_format($gettotal);
                    }

                }
                ?> <u>đ</u>
            </h4>
        </div>
    </div>
    <div style="text-align: center;">
        <?php
        if (isset($_SESSION['makh'])) {
            if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
                echo ("<a href='index.php?action=giohangthanhtoan'><button class='btn btn-success' style='width: 200px; height: 50px; margin-bottom: 5px; font-size: x-large;' >THANH TOÁN</button></a>");
            } else {
                echo ("<a href='index.php?order&action=order'><button class='btn btn-success' style='width: 200px; height: 50px; margin-bottom: 5px; font-size: x-large;' >THANH TOÁN</button></a>");
            }

        } else {
            echo ("<a href='index.php?action=dangnhap&act=chuadangnhap '><button class='btn btn-success' style='width: 200px; height: 50px; margin-bottom: 5px; font-size: x-large;' >THANH TOÁN</button></a>");

        }
        ?>

    </div>
</span>