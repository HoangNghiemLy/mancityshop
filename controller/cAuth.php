<?php 
class cAuth {
    function cRegister () {
        $data = $_POST;
        $mUser = new mUser();

        if($mUser->findEmail($data['email'])) {
            $_SESSION['thongbao'] = 'Trùng email !!!';
            header('location: index.php');
            exit;
        }
        
        if($mUser->save($data)) {
            $_SESSION['thongbao'] = 'Đăng ký thành công !!!';
            header('location: index.php');
            exit;
        }

        $_SESSION['thongbao'] = 'Đăng ký không thành công !!!';
        header('location: index.php');
    }

    function login() {
        $data = $_POST;
        $inputpass = md5($data['password']);

        $mUser = new mUser();

        $user = $mUser->findEmail($data['email']);
        if(!$user) {
            $_SESSION['thongbao'] = 'Tên user không tồn tại !!!';
            header('location: index.php');
            exit;
        }

        if($user['password'] == $inputpass) {
            $_SESSION['thongbao'] = 'Đăng nhập thành công  !!!';
            $_SESSION['login'] = $user['role'];
            $_SESSION['id_cus'] = $user['customer_id'];
            header('location: admin.php');
            exit;
        }
    
        $_SESSION['thongbao'] = 'Đăng nhập không thành công !!!';
        header('location: index.php');
    }
}

?>