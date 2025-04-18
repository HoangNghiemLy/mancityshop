<?php 
class cCart {
    function addCart() {
        $id = $_GET['idpro'] ?? '';
        if(!$id) {
            return;
        }
        // $cProduct = new cProduct();
        // $tmp = $cProduct->listProduct();
        // $product = $tmp[0];

        if(empty($_COOKIE['cart'])) {
            $cart = new mCart();
            $cart->addProduct($id, 1);
        }
        else {
            $array = json_decode($_COOKIE['cart'], true);
            $cart = new mCart($array['items'], $array['quantity'], $array['total_price']);
            $cart->addProduct($id, 1);
        }

        $cart = json_encode($cart);
        setcookie('cart', $cart, time() + 24*60*60);
        header('location: index.php');
    }

    function deleteCart() {
        $id = $_GET['idpro'] ?? '';
        if(!$id) {
            return;
        }

        if(empty($_COOKIE['cart'])) {
            return;
        }
        else {
            $array = json_decode($_COOKIE['cart'], true);
            $cart = new mCart($array['items'], $array['quantity'], $array['total_price']);
            $cart->deleteItem($id);
        }
        $cart = json_encode($cart);
        setcookie('cart', $cart, time() + 24*60*60);
        header('location: index.php');
    }
}


?>