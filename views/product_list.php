<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">🛒 DANH SÁCH SẢN PHẨM (MVC)</h2>
        
        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $sp): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo $sp['image'] ?? 'https://via.placeholder.com/300'; ?>" class="card-img-top" alt="Sản phẩm" style="height: 200px; object-fit: cover;">
                            
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $sp['name']; ?></h5>
                                <p class="card-text text-danger fw-bold">
                                    <?php echo number_format($sp['price']); ?> VNĐ
                                </p>
                                <a href="#" class="btn btn-primary w-100">Đặt mua ngay</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-warning">Chưa có sản phẩm nào trong Database!</div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>