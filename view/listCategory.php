<?php 
$cCategory = new cCategory();
$listCategory = $cCategory->listCategory();

?>

<ul>
    <li>
        <a href="index.php">XEM TẤT CẢ SẢN PHẨM</a>
    </li>
    <?php foreach($listCategory as $category): ?>
    <li>
        <a href="?idcatepro=<?= $category['id'] ?>"><?= $category['name_branch'] ?></a>
    </li>
    <?php endforeach; ?>
</ul>

<form action="" method="GET">
    <!-- <input type="hidden" name="act" value=""> -->
    <input type="text" class="form-control" name="search" value="<?= !empty($_GET['search']) ? $_GET['search'] : ''?>">
    <button class="btn btn-success" type="submit">search</button>
</form>