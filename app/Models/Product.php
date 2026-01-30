<?php
namespace App\Models;

class Product extends BaseModel {
    // Hàm lấy danh sách tất cả sản phẩm
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        // Thực thi câu lệnh SQL
        $stmt->execute();
        
        // Trả về mảng dữ liệu (dạng mảng kết hợp)
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}