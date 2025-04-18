<?php 
$cProduct = new cProduct();
$dsProduct = $cProduct->listProduct();

?>

<div class="container-fluid">
    <div class="row product">
        <?php foreach($dsProduct as $product): ?>
        <div class="col-md-3">
            <div class="imgages">
                <img class="w-100" src="./uploads/product/<?= $product['featured_img'] ?>" alt="">
            </div>
            <div class="name-product">
                <b><?=  $product['name'] ?></b>
            </div>
            <div class="quantity">
                <?php if($product['quantity']): ?>
                <span>Còn Hàng</span>
                <?php else: ?>
                <span>Hết hàng</span>
                <?php endif; ?>
            </div>
            <div class="price">
                <?php if($product['price'] != $product['sale_price']): ?>
                <span class="regular-price">
                    <?= $product['price'] ?>
                </span>
                <?php endif; ?>
                <span class="sale-price">
                    <?= $product['sale_price'] ?>
                </span>
            </div>
            <div class="addcart">
                <a href="?act=addcart&idpro=<?= $product['id'] ?>">Add Cart</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>