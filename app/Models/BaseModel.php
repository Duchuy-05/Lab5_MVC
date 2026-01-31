<?php
namespace App\Models;

use PDO; // Import thư viện PDO có sẵn của PHP

class BaseModel {
    protected $pdo; // Biến lưu trữ kết nối CSDL, kiểu PDO, được sử dụng trong các lớp con

    public function __construct() {
        
        $host = 'localhost';
        $dbname = 'buoi2_php'; 
        $username = 'root';
        $password = '';
        $port = 3307;

        try {
            $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Lỗi kết nối CSDL: " . $e->getMessage();
        }
    }
}