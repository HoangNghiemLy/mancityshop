<?php 
class cCategory {
    function listCategory($cond = NULL) {
        $id = $_GET['idcate'] ?? '';
        if($id) {
            $cond = "id = $id";
        }
        $mCategory = new mCategory();
        $list = $mCategory->fetch_all($cond);
        return  $list;
    }

    function addCategory() {
        $data = $_POST;
        $mCategory = new mCategory();
        if($mCategory->save($data)) {
            $_SESSION['thongbao'] = 'Thêm danh mục thành công !!!';
            header('location: admin.php?act=category');
            exit;
        }
        $_SESSION['thongbao'] = 'Thêm danh mục không thành công !!!';
        header('location: admin.php?act=category');
    }

    function updateCategory() {
        $data = $_POST;
        $mCategory = new mCategory();
        if($mCategory->update($data)) {
            $_SESSION['thongbao'] = 'Cập nhật danh mục thành công !!!';
            header('location: admin.php?act=category');
            exit;
        }
        $_SESSION['thongbao'] = 'Cập nhật danh mục không thành công !!!';
        header('location: admin.php?act=category');

    }

    function deleteCategory() {
        $id = $_GET['idcate'] ?? '';
        
        if(empty($id)) {
            $_SESSION['thongbao'] = 'Xóa danh mục không thành công !!!';
            header('location: admin.php?act=category');
            exit;
        }
        
        $mProduct = new mProduct();
        $mCategory = new mCategory();
        $cond = " categories_id = $id";
        $sanpham = $mProduct->fetch_all($cond);

        if(count($sanpham)) {
            $dem = count($sanpham);
            $_SESSION['thongbao'] = "Danh mục này đang có $dem sản phẩm không thể xóa !!";
            header('location: admin.php?act=category');
            exit;
        }

        if($mCategory->delete($id)) {
            $_SESSION['thongbao'] = 'Xóa danh mục thành công !!!';
            header('location: admin.php?act=category');
            exit;
        }
        $_SESSION['thongbao'] = 'Xóa danh mục không thành công !!!';
        header('location: admin.php?act=category');
    }
}

?>