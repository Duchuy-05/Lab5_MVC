<?php
namespace App\Models;

use PDO; // Import thư viện PDO có sẵn của PHP

class BaseModel {
    protected $conn;

    public function __construct() {
        
        $host = 'localhost';
        $dbname = 'buoi2_php'; 
        $username = 'root';
        $password = '';
        $port = 3307;

        try {
            $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Lỗi kết nối CSDL: " . $e->getMessage();
        }
    }
}