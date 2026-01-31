<?php
namespace App\Controllers;

use App\Models\Product; // Import Model Product

class ProductController {
    public function index() {
        $productModel = new Product();

        // 1. Kiểm tra xem người dùng có nhập từ khóa tìm kiếm không?
        // Lấy keyword từ URL (ví dụ: &keyword=Samsung)
        $keyword = $_GET['keyword'] ?? null;

        if ($keyword) {
            // Nếu có từ khóa -> Gọi hàm tìm kiếm
            $products = $productModel->search($keyword);
        } else {
            // Nếu không có -> Lấy tất cả như bình thường
            $products = $productModel->all();
        }

        // 2. Gửi dữ liệu sang View
        include 'views/product_list.php';
    }
    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $productModel = new Product();
            $productModel->delete($id);
        }

        header("Location: index.php?page=product"); 
        exit;
    }

    // Xử lý trang Chi tiết
    public function detail() {
        $id = $_GET['id'] ?? null;
        
        if ($id) {
            $productModel = new Product();
            $product = $productModel->find($id);
            
            // Gọi View chi tiết
            include 'views/product_detail.php';
        } else {
            echo "Không tìm thấy ID sản phẩm!";
        }
    }
    public function create() {
        include 'views/product_form.php';
    }

    // 2. Xử lý lưu dữ liệu (Có Validation)
    public function store() {
        // Kiểm tra xem người dùng có nhấn nút Submit chưa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Lấy dữ liệu từ form
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $image = $_POST['image'] ?? '';

            // --- VALIDATION (Kiểm tra dữ liệu) ---
            $errors = [];
            if (empty($name)) {
                $errors[] = "Tên sản phẩm không được để trống!";
            }
            if (empty($price)) {
                $errors[] = "Giá sản phẩm không được để trống!";
            }
            if (!is_numeric($price)) {
                $errors[] = "Giá sản phẩm phải là số!";
            }

            // --- XỬ LÝ KẾT QUẢ ---
            if (count($errors) > 0) {
                // Nếu có lỗi -> Gọi lại View và truyền lỗi sang để hiển thị
                include 'views/product_add.php'; 
            } else {
                // Nếu không có lỗi -> Gọi Model để lưu vào DB
                $productModel = new Product();
                $productModel->addProduct($name, $price, $image);

                // Lưu xong thì chuyển hướng về trang danh sách
                header("Location: index.php?page=product");
                exit;
            }
        }
    }
        public function updateProduct($id, $name, $price, $image) {
        // SQL Update: Chỉ sửa dòng có ID tương ứng
        $sql = "UPDATE products SET name = :name, price = :price, image = :image WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id'    => $id,
            'name'  => $name,
            'price' => $price,
            'image' => $image
        ]);
    }
    // 1. Hiển thị Form sửa (GET)
    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = new Product();
            $product = $productModel->find($id); // Tái sử dụng hàm find() có sẵn
            
            if ($product) {
                include 'views/product_form.php';
            } else {
                echo "Không tìm thấy sản phẩm!";
            }
        }
    }

    // 2. Xử lý cập nhật (POST)
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy ID từ URL và dữ liệu từ Form
            $id = $_GET['id'] ?? null;
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_POST['image'];

            if ($id) {
                $productModel = new Product();
                $productModel->updateProduct($id, $name, $price, $image);
            }

            // Quay về trang danh sách
            header("Location: index.php?page=product");
            exit;
        }
    }
}
