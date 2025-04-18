<?php 
$cCategory = new cCategory();
$tmp = $cCategory->listCategory();
$category = current($tmp);
?>
<form method="POST" action="#!">
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $category['id'] ?>">
        <label for="categoryName">Tên danh mục</label>
        <input type="text" value="<?= $category['name_branch'] ?>" name="name_branch" class="form-control"
            id="categoryName" placeholder="Nhập tên danh mục" required>
    </div>
    <button type="submit" class="btn btn-success" name="btnadd">Thêm danh mục</button>
</form>
<?php 
if(isset($_POST['btnadd'])) {
    $cCategory = new cCategory();
    $cCategory->updateCategory();
}
?>