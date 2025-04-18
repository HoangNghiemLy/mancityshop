<?php 
class mConnect {
    function openDB() {
        $conn = new mysqli('localhost', 'root', '' , 'new');
        if($conn->connect_error) {
            die('kết nối thất bại' . $conn->error);
        }
        return $conn;
    }

    function closeDB($conn) {
        $conn->close();
    }
}

?>