<?php 
class cCheck {
    function checkout() {
        if(empty($_COOKIE)) {
            $_SESSION['thongbao'] = 'Gio hang dang trong !!!';
            header('location: index.php');
            exit;
        }
    
        $array = json_decode($_COOKIE['cart'], true);
    
        $items = $array['items'];
        $quantity = $array['quantity'];
        $total_price = $array['total_price'];
    
        if(!count($items)) {
            $_SESSION['thongbao'] = 'Gio hang dang trong !!!';
            header('location: index.php');
            exit;
        }
    
        $data = [
            'items' => $items,
            'quantity' => $quantity,
            'total_price' => $total_price
        ];
    
        return $data;
    }

    function saveOrder() {
        $mOrder = new mOrder();
        $mOrderDetail = new mOrderDetail();

        $data = $this->checkout();

        $tmp = [
            'quantity' => $data['quantity'],
            'total_price' => $data['total_price'],
            'id_customer' => $_SESSION['id_cus']
        ];

        if(!$mOrder->save($tmp)) {
            $_SESSION['thongbao'] = 'thêm đơn hàng thất bại 1 !!!';
            header('location: index.php');
            exit;
        }

        $items = $data['items'];
        $latestOrder = $mOrder->fetch_all();
        foreach($items as $key => $item) {
            $tmp = [
                'product_id' => $key,
                'order_id' => $latestOrder
            ];

            if(!$mOrderDetail->save($tmp)) {
                $_SESSION['thongbao'] = 'thêm đơn hàng thất bại 2 !!!';
                header('location: index.php');
                exit;
            }  
        }


        setcookie('cart', '', time() - 24 * 60 * 60);
        $_SESSION['thongbao'] = 'thêm đơn hàng thành công !!!';
        header('location: index.php');
    }
}




?>