<?php 
class mCategory {
    function fetch_all($cond = NULL) {
        $sql = "SELECT * FROM categories";

        if($cond) {
            $sql .= " WHERE $cond";
        }

        $tmp = new mConnect();
        $conn = $tmp->openDB();

        $result = $conn->query($sql);
        $categorys = array();

        if($result->num_rows) {
            while($row = $result->fetch_assoc()) {
                $category = [
                    'id' => $row['id'],
                    'name_branch' => $row['name_branch'],
                ];
                $categorys[] = $category;
            }
        }

        return $categorys;
    }

    function save($data) {
        // $id = $data['id'];
        $name = $data['name_branch'];


        $sql = "INSERT INTO categories ( `name_branch` ) VALUES ('$name')";
        $tmp = new mConnect();
        $conn = $tmp->openDB();

        if($conn->query($sql)) {
            return true;
        }
        return false;
    }

    function update($data) {
        $id = $data['id'];
        $name = $data['name_branch'];


        $sql = "UPDATE categories SET `name_branch` = '$name' WHERE id = $id";

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

        $sql = "DELETE FROM categories WHERE id = $id";

        if($conn->query($sql)) {
            return true;
        }
        return false;
    }
}

?>