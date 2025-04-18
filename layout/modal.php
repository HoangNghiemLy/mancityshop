<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header d-inline-block">
                <h5 class="modal-title text-center" id="modalTitleId">
                    GIỎ HÀNG
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid titlecart">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-1 ">
                            <h6>STT</h6>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-2 ">
                            <h6>Hình Anh</h6>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-4 ">
                            <h6>Tên</h6>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-2 ">
                            <h6>Đơn Gía</h6>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-2 ">
                            <h6>Số lượng</h6>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-1 ">

                        </div>
                    </div>
                </div>
                <div class="container-fluid info-cart mt-3">
                    <?php
                        if(empty($_COOKIE['cart'])) {
                            echo '<p class="text-center">Chưa có hàng nào được thêm vào giỏ</p>';
                        }
                        else {

                       

                        $array = json_decode($_COOKIE['cart'], true);
                        $items = $array['items'];
                        $quantity = $array['quantity'];
                        $total_price = $array['total_price'];

                        if(!count($array['items'])) {
                            echo '<p class="text-center">Chưa có hàng nào được thêm vào giỏ</p>';
                        }
                        else {
                        $stt = 0;
                        foreach($items as $key => $itm):
                            $stt++;
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-1">
                            <p><?= $stt ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-2 ">
                            <img style="width: 30%; height: 50%;" src="./uploads/product/<?= $itm['featured_img'] ?>"
                                alt="">
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-4 ">
                            <p><?= $itm['name'] ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-2 ">
                            <p><?= $itm['price'] ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-2 ">
                            <p><?= $itm['quantity'] ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-1 ">
                            <a href="?act=deletecart&idpro=<?= $key ?>">XÓA</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    tiếp tục

                </button>
                <a type="submit" class="btn btn-primary" href="?act=checkout">
                    Mua hàng
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Place to the bottom of scripts -->