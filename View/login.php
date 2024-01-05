<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Đăng nhập</h2>
                    <form action="index.php?action=dangnhap&act=dangnhap_action" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label" style="font-size:13px;">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="txtusername" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label" style="font-size:13px;">Mật khẩu</label>
                            <input type="password" class="form-control" name="txtpassword" required>
                        </div>
                        <div class="mb-3 form-check">
                            <a href="index.php?action=forgetps" class="float-end" style="font-size:13px;">Quên mật
                                khẩu?</a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Đăng nhập</button>
                    </form>
                    <div class="mt-3 text-center" style="font-size:13px;">
                        Bạn chưa có tài khoản? <a href="index.php?action=dangky">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>