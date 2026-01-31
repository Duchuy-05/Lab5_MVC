<?php
require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
        
    case 'product': 
        $controller = new ProductController();
        $controller->index();
        break;
    case 'product-delete':
        $controller = new ProductController();
        $controller->delete();
        break;

    case 'product-detail':
        $controller = new ProductController();
        $controller->detail();
        break;
    case 'product-add':
        $controller = new ProductController();
        $controller->create();
        break;

    // 2. Route nhận dữ liệu từ Form gửi lên (Method POST)
    case 'product-store':
        $controller = new ProductController();
        $controller->store();
        break;
    case 'product-edit':
        $controller = new ProductController();
        $controller->edit();
        break;

    case 'product-update':
        $controller = new ProductController();
        $controller->update();
        break;
        
    default:
        echo "404 - Page Not Found";
        break;
}
?>