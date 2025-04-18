<?php 
$cCategory = new cCategory();
$listCategory = $cCategory->listCategory();
?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Danh Mục</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $stt = 0;
            foreach($listCategory as $category): 
                $stt++;
            ?>
            <tr>
                <td><?= $stt ?></td>
                <td><?= $category['name_branch'] ?></td>
                <td><a href="?act=editcategory&idcate=<?= $category['id'] ?>" class="btn btn-warning btn-sm">SỬA</a>
                </td>
                <td><a href="?act=deletecategory&idcate=<?= $category['id'] ?>" class="btn btn-danger btn-sm">XÓA</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>