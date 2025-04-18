<form action="#!" method="POST" class="w-100">
    <h2 class="text-center">form đăng nhập</h2>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
    </div>
    <button type="submit" name="btnDangNhap" class="btn btn-primary w-100">Đăng Nhập</button>
</form>
<?php 
if(isset($_POST['btnDangNhap'])) {
    $cAuth = new cAuth();
    $cAuth->login();
}

?>