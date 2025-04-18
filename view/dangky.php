<form method="POST" action="#!" class="w-100">
    <h2 class="text-center">form đăng ký</h2>
    <div class="mb-3">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Nhập tên đăng nhập">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
    </div>
    <button type="submit" class="btn btn-primary w-100" name='btnDangKy'>Đăng Ký</button>
</form>

<?php 
if(isset($_POST['btnDangKy'])) {
    $cAuth = new cAuth();
    $cAuth->cRegister();
}

?>