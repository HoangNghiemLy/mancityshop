<!DOCTYPE html>
<html lang="en">
<?php 
ob_start();
session_start();
require './model/mCategory.php';
require './model/mConnect.php';
require './model/mProduct.php';
require './model/mUser.php';
require './controller/cAuth.php';
require './controller/cCategory.php';
require './controller/cProduct.php';
require './controller/cCart.php';
require './model/mCart.php';
require './layout/modal.php';
require './controller/cCheck.php';
require './model/mOrderDetail.php';
require './model/mOrder.php';
// var_dump(json_decode($_COOKIE['cart'], true));
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuối Kỳ</title>
    <link rel="stylesheet" href="./public/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    .modal .modal-body h6 {
        font-size: 20px;
    }

    .header img {
        height: 250px;
        object-fit: cover;
    }

    .header {
        border: 1px solid #333;
    }

    .main {
        border: 1px solid #333;
        border-top: unset;
    }

    .aside {
        border-right: 1px solid #333;
    }

    nav {
        border: 1px solid #333;
        border-top: unset;
    }

    nav ul {
        display: flex;
        list-style: none;
    }

    .product img {
        height: 239.85px;
        object-fit: cover;
    }

    nav li {
        margin-right: 50px;
    }

    a {
        text-decoration: none;
    }

    .regular-price {
        text-decoration: line-through;
    }

    .footer {
        border: 1px solid #333;
        border-top: unset;
    }

    .modal .modal-title .btn-close.btn-sm:focus {
        box-shadow: unset;
    }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="header row">
            <div class="col-12">
                <img class="w-100" src="./uploads/Heisenberg.jpg" alt="">
            </div>
        </div>
        <nav class="row">
            <?php require './layout/menu.php'; ?>
        </nav>
        <div class="main row">
            <div class="col-md-3 aside">
                <b>DANH MỤC SẢN PHẨM</b>
                <?php require './view/listCategory.php' ?>
            </div>
            <div class="col-md-9">
                <?php 
                if(isset($_SESSION['thongbao'])) {
                    $mess = $_SESSION['thongbao'];
                    echo "<script>alert('$mess')</script>";
                    unset($_SESSION['thongbao']);
                }

                if(isset($_GET['act'])) {
                    if($_GET['act'] == 'dangnhap') {
                        require './view/dangnhap.php';
                    }
                    else if($_GET['act'] == 'dangky') {
                        require './view/dangky.php';
                    }
                    else if($_GET['act'] == 'addcart') {
                        $cCart = new cCart();
                        $cCart->addCart();
                    }
                    else if($_GET['act'] == 'deletecart') {
                        $cCart = new cCart();
                        $cCart->deleteCart();
                    }
                    else if($_GET['act'] == 'checkout') {
                        require './view/checkout.php';
                    }
                    else if($_GET['act'] == 'savecheck') {
                        if(!isset($_SESSION['login'])) {
                            $_SESSION['thongbao'] = 'Yêu cầu đăng nhập trước khi đặt hàng nhé !!!';
                            header('location: index.php');
                            exit;
                        }
                        $cCheck = new cCheck();
                        $cCheck->saveOrder();
                    }
                    else {
                        echo 'trang không tồn tại';
                    }
                }
                
                else {
                    require './view/listProduct.php';
                }
                ?>
            </div>
        </div>
        <?php require './view/cammo.php' ?>