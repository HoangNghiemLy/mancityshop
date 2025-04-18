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

if(empty($_SESSION['login'])) {
    $_SESSION['thongbao'] = 'Bạn không có đủ thẩm quyền !!!';
    header('location: index.php');
    exit;
}

if($_SESSION['login'] == 3) {
    header('location: index.php');
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuối Kỳ - Quản Trị</title>
    <link rel="stylesheet" href="./public/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
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
                <b>QUẢN LÝ SẢN PHẨM</b>
                <ul>
                    <li>
                        <a href="?act=sanpham">QUẢN LÝ SẢN PHẨM</a>
                        <ul>
                            <li>
                                <a href="?act=addsanpham">THÊM SẢN PHẨM</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?act=category">QUẢN LÝ DANH MỤC</a>
                        <ul>
                            <li>
                                <a href="?act=addcategory">THÊM DANH MỤC</a>
                            </li>
                        </ul>
                    </li>
                    <?php 
                    if($_SESSION['login'] != 2):
                    ?>
                    <li>
                        <a href="">QUẢN LÝ TÀI KHOẢN</a>
                        <ul>
                            <li>
                                <a href="">THÊM TÀI KHOẢN</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-md-9">
                <?php 
                if(isset($_SESSION['thongbao'])) {
                    $mess = $_SESSION['thongbao'];
                    echo "<script>alert('$mess')</script>";
                    unset($_SESSION['thongbao']);
                }

                if(isset($_GET['act'])) {
                    switch($_GET['act']) {
                        case 'sanpham':
                            require './view/tableProduct.php';
                            break;
                        case 'category':
                            require './view/tableCategory.php';
                            break;
                        case 'addcategory':
                            require './view/addcategory.php';
                            break;
                        case 'addsanpham':
                            require './view/addproduct.php';
                            break;
                        case 'editsanpham';
                            require './view/editproduct.php';
                            break;
                        case 'editcategory':
                            require './view/editcategory.php';
                            break;
                        case 'deletecategory':
                            $cCategory = new cCategory();
                            $cCategory->deleteCategory();
                            break;
                        case 'deletesanpham':
                            $cProduct = new cProduct();
                            $cProduct->deleteProduct();
                            break;
                        default:
                            echo 'Hello';
                            break;
                    }
                }

                
                ?>
            </div>
        </div>
        <?php require './view/cammo.php' ?>