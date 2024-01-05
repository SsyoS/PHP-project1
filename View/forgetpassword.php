<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Quên mật khẩu</h2>
                    <form action="index.php?action=forgetps&act=forgetps_action" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label" style="font-size:13px;">Địa chỉ email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Đặt lại mật khẩu</button>
                    </form>
                    <div class="mt-3 text-center" style="font-size:13px;">
                        Bạn có nhớ mật khẩu của mình không? <a href="index.php?action=dangnhap">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>