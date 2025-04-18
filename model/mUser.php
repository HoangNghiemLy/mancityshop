<?php 
class mUser {
    function save($data) {
        $username = $data['username'];
        $password = md5($data['password']);
        $email = $data['email'];
        $active = 1;

        $tmp = new mConnect();
        $conn = $tmp->openDB();

        $sql = "INSERT INTO customer (active, username, `password`, `email`) VALUES ($active, '$username', '$password', '$email') ";
        
        if($conn->query($sql)) {
            return true;
        }
        return false;
    }

    function findEmail($email) {
        $sql = "SELECT * FROM customer WHERE email = '$email'";

        $tmp = new mConnect();
        $conn = $tmp->openDB();

        $result = $conn->query($sql);
        if($result->num_rows) {
            $row = $result->fetch_assoc();
            return $row;
        }
        return NULL;
    }

    
}

?>