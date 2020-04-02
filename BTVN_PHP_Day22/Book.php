<?php

class Book {
    //define
    //khai báo các hằng kết nói tới CSDL
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'book_oop';
    const DB_PORT = 3306;

    public $id;
    public $name;
    public $amount;
    public $created_at;

    public function connectDatabase() {
        $connection = mysqli_connect(self::DB_HOST,
            self::DB_USERNAME, self::DB_PASSWORD,
            self::DB_NAME, self::DB_PORT);
        if (!$connection) {
            die("KẾt nối thất bại, lỗi: " . mysqli_connect_error());
        }
        mysqli_query($connection, "SET NAMES 'utf8mb4'");

        return $connection;
    }

    public function disconnectDatabase($connection) {
        mysqli_close($connection);
    }

    public function insertBook() {
        echo 'Phương thức insertBook';
        //1 - Kết nối tới CSDL
        $connection = $this->connectDatabase();
        $result = "";
        //2 - Viết truy vấn và thực thi truy vấn để insert
        $query_insert = "INSERT INTO books(`name`, `amount`) VALUES('{$this->name}', {$this->amount})";
        $is_insert = mysqli_query($connection, $query_insert);
        //3 - Đóng kết nối

        if($is_insert){
            $result = "Thêm sách thành công";
        } else {
            $result = "Thêm sách thất bại";
        }

        $this->disconnectDatabase($connection);
        return $result;
    }

    /**
     * Liệt kê danh sách book đang có trong DB
     */
    public function listBook() {
        echo 'Phương thức listBook';
        $connection = $this->connectDatabase();
        $query_select = "SELECT * FROM `books`";

        $results = mysqli_query($connection, $query_select);
        $books = [];
        if (mysqli_num_rows($results) > 0) {
            $books = mysqli_fetch_all($results, MYSQLI_ASSOC);
            echo "<pre>";
            print_r($books);
            echo "</pre>";
        }

        $this->disconnectDatabase($connection);
        return $results;
    }

    public function editBook($id) {
        echo 'Phương thức editBook';
        $connection = $this->connectDatabase();
        $result = "";
        $this->id = $id;
        $query_edit = "UPDATE `books` SET `name` = '{$this->name}', `amount` = {$this->amount} WHERE `id` = $id";

        $is_edit = mysqli_query($connection, $query_edit);

        if($is_edit){
            $result = "Sửa thành công";
        } else {
            $result = "Sửa thất bại";
        }

        $this->disconnectDatabase($connection);
        return $result;
    }

    public function deleteBook($id) {
        echo 'Phương thức deleteBook';
        $connection = $this->connectDatabase();
        $result = "";
        $this->id = $id;
        $query_delete = "DELETE FROM `books` WHERE `id` = $id";

        $is_delete = mysqli_query($connection, $query_delete);

        if($is_delete){
            $result = "Xóa thành công";
        } else {
            $result = "Xóa thất bại";
        }

        $this->disconnectDatabase($connection);
        return $result;
    }
}
