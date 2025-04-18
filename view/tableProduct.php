<?php 
$cProduct = new cProduct();
$listProduct = $cProduct->listProduct();

?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Hình</th>
                <th>Số lượng</th>
                <th>Gía Thường</th>
                <th>Gía Giam</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $stt = 0;
            foreach($listProduct as $product):
                $stt++;
            ?>
            <tr>
                <td><?= $stt ?></td>
                <td><?= $product['name'] ?></td>
                <td style="width: 20%;"><img src="./uploads/product/<?= $product['featured_img'] ?>"
                        alt="<?= $product['featured_img'] ?>" class="w-100">
                </td>
                <td><?= $product['quantity'] ?></td>
                <td><?= $product['price']  ?></td>
                <td><?=  $product['sale_price'] ?></td>
                <td><a href="?act=editsanpham&idpro=<?= $product['id'] ?>" class="btn btn-warning btn-sm">SỬA</a></td>
                <td><a href="?act=deletesanpham&idpro=<?= $product['id'] ?>" class="btn btn-danger btn-sm">XÓA</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>