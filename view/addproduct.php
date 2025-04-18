<?php 
$cCategory = new cCategory();
$listCategory = $cCategory->listCategory();
?>
<form method="POST" enctype="multipart/form-data" action="#!">
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="featured_img">Hình ảnh</label>
        <input type="file" class="form-control" id="featured_img" name="featured_img">
    </div>
    <div class="form-group">
        <label for="discount">Giảm giá (%)</label>
        <input type="number" class="form-control" id="discount" name="discount" min="0">
    </div>
    <div class="form-group">
        <label for="price">Giá gốc</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="quantity">Số lượng</label>
        <input type="number" class="form-control" id="quantity" name="quantity" min="0" required>
    </div>
    <div class="form-group">
        <label for="featured">Nổi bật</label>
        <select class="form-control" id="featured" name="featured">
            <option value="1">Có</option>
            <option value="0">Không</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sale_price">Giá khuyến mãi</label>
        <input type="number" class="form-control" id="sale_price" name="sale_price">
    </div>
    <div class="form-group">
        <label for="categories_id">Danh mục</label>
        <select name="categories_id" id="" class="form-control">
            <option value="">-- Vui lòng chọn danh mục --</option>
            <?php foreach($listCategory as $category) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['name_branch'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" name="btnAdd" class="btn btn-primary mt-3">Thêm sản phẩm</button>
</form>
<?php 
if(isset($_POST['btnAdd'])) {
    $cProduct = new cProduct();
    $cProduct->addProduct();
}
?>