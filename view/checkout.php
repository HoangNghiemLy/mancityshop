<?php 
$cCheckout = new cCheck();
$list = $cCheckout->checkout();

$items = $list['items'];
?>
<div class="container-fluid">
    <?php foreach($items as $item): ?>
    <div class="row product-checkout">
        <div class="col-4">
            <img src="./uploads/product/<?= $item['featured_img'] ?>" class="w-50" alt="">
        </div>
        <div class="col-8 ">
            <p style="text-align: right;"><?= $item['name'] ?></p>
            <p style="text-align: right;"><?= $item['quantity'] . 'x' . $item['price'] ?></p>
        </div>
    </div>
    <hr>
    <?php endforeach; ?>
    <div class="text-end">
        <a class="btn btn-success" href="?act=savecheck">Đặt Hàng</a>
    </div>
</div>