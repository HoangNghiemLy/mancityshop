<?php 
class mProduct {
    function fetch_all($cond = NULL, $sort = NULL) {
        $sql = "SELECT * FROM view_product";

        if($cond) {
            $sql .= " WHERE $cond";
        }

        if($sort) {
            $sql .= " $sort";
        }

        $tmp = new mConnect();
        $conn = $tmp->openDB();

        $result = $conn->query($sql);
        $products = array();

        if($result->num_rows) {
            while($row = $result->fetch_assoc()) {
                $product = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'featured_img' => $row['featured_img'],
                    'discount' => $row['discount'],
                    'categories_id' => $row['categories_id'],
                    'quantity' => $row['quantity'],
                    'price' => $row['price'],
                    'sale_price' => $row['sale_price'],
                    'description' => $row['description']
                ];
                $products[] = $product;
            }
        }

        return $products;
    }

    function save($data, $tenHinhAnh) {
        // $id = $data['id'];
        $name = $data['name'];
        $featured_img = $tenHinhAnh;
        $discount = $data['discount'];
        $categories_id = $data['categories_id'];
        $quantity = $data['quantity'];
        $price = $data['price'];
        $sale_price = $data['sale_price'];
        $description = $data['description'];

        $sql = "INSERT INTO view_product ( `name`, featured_img, discount,  categories_id,  quantity, price, sale_price, `description`) VALUES ('$name', '$featured_img', $discount, $categories_id, $quantity, $price, $sale_price, '$description')";
        
        $tmp = new mConnect();
        $conn = $tmp->openDB();

        if($conn->query($sql)) {
            return true;
        }
        return false;
    }

    function update($data, $tenHinhAnh) {
        $id = $data['id'];
        $name = $data['name'];
        $featured_img = $tenHinhAnh;
        $discount = $data['discount'];
        $categories_id = $data['categories_id'];
        $quantity = $data['quantity'];
        $price = $data['price'];
        $sale_price = $data['sale_price'];
        $description = $data['description'];

        $sql = "UPDATE view_product SET `name` = '$name', featured_img = '$featured_img', discount = $discount,  categories_id = $categories_id,  quantity = $quantity, price = $price, sale_price = $sale_price, `description` = '$description' WHERE id = $id";

        $tmp = new mConnect();
        $conn = $tmp->openDB();

        if($conn->query($sql)) {
            return true;
        }
        return false;


    }

    function delete($id) {
        $tmp = new mConnect();
        $conn = $tmp->openDB();

        $sql = "DELETE FROM view_product WHERE id = $id";

        if($conn->query($sql)) {
            return true;
        }
        return false;
    }
    
}


?>