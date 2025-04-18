<?php 
class mOrder {

    function fetch_all() {
        $sql = "SELECT * FROM `order` ORDER BY id DESC";
        
        $tmp = new mConnect();
        $conn = $tmp->openDB();

        $result = $conn->query($sql);
        $ids = array();
        if($result->num_rows) {
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $ids[] = $id;
            }
        }
        return current($ids);
    }

    function save($data) {

        $quantity = $data['quantity'];
        $total_price = $data['total_price'];
        $id_customer = $data['id_customer'];

        $sql = "INSERT INTO `order` (`quantity`, `total_price`, `id_customer`) VALUES ($quantity, $total_price, $id_customer)";

        

        $tmp = new mConnect();
        $conn = $tmp->openDB();
        // $conn->query($sql);
        // var_dump($data);
        // var_dump($conn->error);exit;
        if($conn->query($sql)) {
            return true;
        }
        return false;
    }
    // You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')' at line 1'
    // You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '23, 45000000, )' at line 1
}

?>