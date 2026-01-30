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

    default:
        echo "404 - Page Not Found";
        break;
}
?>