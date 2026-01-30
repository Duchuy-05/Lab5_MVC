<?php
namespace App\Controllers;

use App\Models\Student;

class HomeController{
    public function index() {
        $modelStudent = new Student();
        $studentInfo = $modelStudent->getInfo();

        $message = "Chào mừng bạn đến với MVC Framework!";
        // Truyền dữ liệu ra view
        include 'views/home.php';
    }
}
?>