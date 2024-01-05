<!--  -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Đăng ký</h2>
                    <form action="index.php?action=dangky&act=inset_item" method="post">
                        <div class="mb-3">
                            <label for="txttenkh" class="form-label" style="font-size:13px;">Tên Khách Hàng</label>
                            <input type="text" class="form-control" name="txttenkh"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=="inset_item") echo $_POST['txttenkh'] ?>">
                            <p style="color:red">
                                <?php if(isset($_GET['act']) && $_GET['act']=='inset_item') echo $_SESSION['nameErr'] ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="txtdiachi" class="form-label" style="font-size:13px;">Địa chỉ</label>
                            <input type="text" class="form-control" name="txtdiachi"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=="inset_item") echo $_POST['txtdiachi'] ?>">
                            <p style="color:red">
                                <?php if(isset($_GET['act']) && $_GET['act']=='inset_item') echo $_SESSION['diachiErr'] ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="txtsodt" class="form-label" style="font-size:13px;">Số điện thoại</label>
                            <input type="text" class="form-control" name="txtsodt"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=="inset_item") echo $_POST['txtsodt'] ?>">
                            <p style="color:red">
                                <?php if(isset($_GET['act']) && $_GET['act']=='inset_item') echo $_SESSION['phoneErr'] ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="txtusername" class="form-label" style="font-size:13px;">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="txtusername"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=="inset_item") echo $_POST['txtusername'] ?>">
                            <p style="color:red">
                                <?php if(isset($_GET['act']) && $_GET['act']=='inset_item') echo $_SESSION['tenErr'] ?>
                            </p>
                        </div>
<div class="mb-3">
                            <label for="txtemail" class="form-label" style="font-size:13px;">Email</label>
                            <input type="email" class="form-control" name="txtemail"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=="inset_item") echo $_POST['txtemail'] ?>">
                            <p style="color:red">
                                <?php if(isset($_GET['act']) && $_GET['act']=='inset_item') echo $_SESSION['emailErr'] ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="txtpass" class="form-label" style="font-size:13px;">Mật khẩu</label>
                            <input type="password" class="form-control" name="txtpass"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=="inset_item") echo $_POST['txtpass'] ?>">
                            <p style="color:red">
                                <?php if(isset($_GET['act']) && $_GET['act']=='inset_item') echo $_SESSION['passErr'] ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="retypepassword" class="form-label" style="font-size:13px;">Nhập lại mật
                                khẩu</label>
                            <input type="password" class="form-control" name="retypepassword"
                                value="<?php if(isset($_GET['act']) && $_GET['act']=="inset_item") echo $_POST['retypepassword'] ?>">
                            <p style="color:red">
                                <?php if(isset($_GET['act']) && $_GET['act']=='inset_item') echo  $_SESSION['pasErr'] ?>
                            </p>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Đăng ký</button>
                    </form>
                    <div class="mt-3 text-center" style="font-size:13px;">
                        Bạn đã có tài khoản? <a href="index.php?action=dangnhap">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>