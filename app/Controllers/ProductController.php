<?php
namespace App\Controllers;

use App\Models\Product; // Import Model Product

class ProductController {
    public function index() {
        // 1. Gọi Model để lấy dữ liệu
        $productModel = new Product();
        $products = $productModel->getAllProducts();

        // 2. Gửi dữ liệu $products sang View
        include 'views/product_list.php';
    }
}