<?php


$hh = new hanghoa();
if (isset($_SESSION['makh'])) {
    $vaitro = $hh->getdangnhap($_SESSION['makh']);
}
?>

<header style="margin-top: 20px ">
    <!-- nav san pham -->
    <section class="col-12" style="height:100px;">
        <div class="col-12">
            <div class="row">

                <!-- test -->
                <nav class="navbar navbar-expand-sm bg-light navbar-light">
                    <!-- Brand -->
                    <a class="navbar-brand" href="index.php">
                        <img src="./Content/hinhanh/logo.png" alt="Logo" style="width:200px;" class="rounded-pill">
                    </a>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=gioithieu">Về MIOTO</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=sanpham">Thuê xe ngay</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Thành Viên
                            </a>
                            <div class="dropdown-menu">
                                <?PHP if (!isset($_SESSION['makh'])) {
                                    echo (' <a class="dropdown-item" href="index.php?action=dangnhap">Đăng nhập </a>
                               <a class="dropdown-item" href="index.php?action=dangky">Đăng ký</a>');
                                } else {
                                    echo (' <a href="index.php?action=hoso" ><button class="btn btn-default"> <span class="fa-solid fa-user "></span> Hồ sơ thành viên </button></a>');
                                    echo (' <a href="index.php?action=doimatkhau" > <button class="btn btn-default"> <i class="fa-solid fa-lock"></i> Đổi mật khẩu </button></a>');
                                    echo ('<a href="index.php?action=dangnhap&act=logout"><button class="btn btn-default"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất </button></a>');
                                }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?&action=giohang"> 
                            <button type="button" class="btn btn-outline-secondary" style="border:0;">
                            <i class="fa-solid fa-cart-shopping"></i>
                              Giỏ hàng
                            </button>
                            </a>
                        </li>
                        <?php
                        if (isset($vaitro)) {
                            if ($vaitro == 2) {
                                echo ('<!-- Quản trị Doanh Mục -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Quản Trị Doanh Mục
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?phu=adddiadiem&action=diadiem">địa điểm</a>
        <a class="dropdown-item" href="index.php?phu=addhangxe&action=hangxe">hãng xe</a>
        <a class="dropdown-item" href="index.php?action=hanghoa">Sản Phẩm</a>
        <a class="dropdown-item" href="index.php?action=hoadon">Hóa Đơn</a>
        <a class="dropdown-item" href="index.php?action=khachhang">Khách hàng</a>
        <a class="dropdown-item" href="index.php?action=voucher">voucher</a>

    </div>
</li>

');
                            }
                        }
                        ?>
                        <?php
                        if (isset($vaitro)) {
                            if ($vaitro == 1) {
                                echo ('<!-- Quản trị Doanh Mục -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Quản Trị Doanh Mục
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?phu=adddiadiem&action=diadiem">địa điểm</a>
        <a class="dropdown-item" href="index.php?phu=addhangxe&action=hangxe">hãng xe</a>
        <a class="dropdown-item" href="index.php?action=hanghoa">Sản Phẩm</a>
        <a class="dropdown-item" href="index.php?action=hoadon">Hóa Đơn</a>
        <a class="dropdown-item" href="index.php?action=khachhang">Khách hàng</a>
        <a class="dropdown-item" href="index.php?action=voucher">voucher</a>

    </div>
</li>

');
                            }
                        }
                        ?>
                    </ul>
                </nav>
                <!-- end test -->
            </div>
        </div>

    </section>
</header>