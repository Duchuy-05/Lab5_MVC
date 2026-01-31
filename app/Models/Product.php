<?php
namespace App\Models;

class Product extends BaseModel {

    // Hàm lấy danh sách tất cả sản phẩm
    public function all() {
        $sql = "SELECT * FROM products"; //truy van

        // ke thua tu BaseModel
        $stmt = $this->pdo->prepare($sql);
        // Thực thi câu lệnh SQL
        $stmt->execute();
        
        // Trả về mảng dữ liệu (dạng mảng kết hợp)
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // 2. Hàm lấy thông tin 1 sản phẩm theo ID (Dùng cho trang Chi tiết)
    public function find($id) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC); // Chỉ lấy 1 dòng
    }
    public function addProduct($name, $price, $image) {
        $sql = "INSERT INTO products (name, price, image) VALUES (:name, :price, :image)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'price' => $price,
            'image' => $image
        ]);
    }
    public function updateProduct($id, $name, $price, $image) {
        $sql = "UPDATE products SET name = :name, price = :price, image = :image WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'image' => $image
        ]);
    }
    public function search($keyword) {
        // Dấu % bao quanh keyword nghĩa là: tìm những tên có chứa chữ đó ở bất kỳ vị trí nào
        $sql = "SELECT * FROM products WHERE name LIKE :keyword";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'keyword' => "%$keyword%" 
        ]);
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}