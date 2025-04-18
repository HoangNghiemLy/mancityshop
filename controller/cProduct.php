<?php 
class cProduct {
    function listProduct($cond = NULL) {
        $mProduct = new mProduct();
        $id = $_GET['idpro'] ?? '';
        $idcate = $_GET['idcatepro'] ?? '';
        $search = $_GET['search'] ?? '';
        if($id) {
            $cond = " id = $id";
        }

        if($idcate) {
            $cond = " categories_id = $idcate"; 
        }

        if($search) {
            $cond = " name LIKE '%$search%'";
        }

        $listProduct = $mProduct->fetch_all($cond);
        return $listProduct;
    }

    function addProduct() {
        $data = $_POST;
        $hinhanh = $_FILES;

        if(!move_uploaded_file($hinhanh['featured_img']['tmp_name'], './uploads/product/' . $hinhanh['featured_img']['name'])) {
            $_SESSION['thongbao'] = 'Thêm sản phẩm không thành công !!';
            header('location: admin.php?act=sanpham');
            exit;
        }


        $mProduct = new mProduct();
        if($mProduct->save($data, $hinhanh['featured_img']['name'])) {
            $_SESSION['thongbao'] = 'Thêm sản phẩm thành công !!!';
            header('location: admin.php?act=sanpham');
            exit;
        }
        $_SESSION['thongbao'] = 'Thêm sản phẩm không thành công !!!';
        header('location: admin.php?act=sanpham');
    }

    function updateProduct() {
        $data = $_POST;
        $tenhinhanh = $_POST['oldpicture'];
        if(!empty($_FILES['featured_img']['name'])) {
            if(file_exists('./uploads/product/' . $tenhinhanh)) {
                unlink('./uploads/product/' . $tenhinhanh);
            }

            if(!move_uploaded_file($_FILES['featured_img']['tmp_name'], './uploads/product/' . $_FILES['featured_img']['name'])) {
                $_SESSION['thongbao'] = 'Cập nhật sản phẩm không thành công vi upload sai!!!';
                header('location: admin.php?act=product');
                exit;
            }

            $tenhinhanh = $_FILES['featured_img']['name'];
        }

        $mProduct = new mProduct();
        if($mProduct->update($data, $tenhinhanh)) {
            $_SESSION['thongbao'] = 'Cập nhật sản phẩm thành công !!!';
            header('location: admin.php?act=product');
            exit;
        }
        $_SESSION['thongbao'] = 'Cập nhật sản phẩm không thành công !!!';
        header('location: admin.php?act=product');

    }

    function deleteProduct() {
        $id = $_GET['idpro'];
        $mProduct = new mProduct();
        
        $tmp = $this->listProduct();
        $product = $tmp[0];

        if(file_exists('./uploads/product/' . $product['featured_img'])) {
            unlink('./uploads/product/' . $product['featured_img']);
        }

        if($mProduct->delete($id)) {
            $_SESSION['thongbao'] = 'Xóa sản phẩm thành công !!!';
            header('location: admin.php?act=sanpham');
            exit;
        }
        $_SESSION['thongbao'] = 'Xóa sản phẩm không thành công !!!';
        header('location: admin.php?act=sanpham');
    }

    
}

?>