<?php 
class mOrderDetail {
    function save($data) {
        $product_id = $data['product_id'];
        $order_id = $data['order_id'];

        $tmp = new mConnect();
        $conn = $tmp->openDB();



        $sql = "INSERT INTO `order_detail` (product_id, order_id) VALUES ($product_id, $order_id)";
        // $conn->query($sql);
        // var_dump($data);
        // var_dump($conn->error);
        // exit;
        if($conn->query($sql)) {
            return true;
        }
        return false;
    }
}


?>