<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ MVC</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        .box { border: 1px solid #ccc; padding: 20px; display: inline-block; }
        h1 { color: #2c3e50; }
        p { color: #ff0000; font-weight: bold; }
    </style>
</head>
<body>
    <div class="box">
        <h1><?php echo $message; ?></h1>
        <p>Thông tin sinh viên: <?php echo $studentInfo; ?></p>
    </div>
</body>
</html>