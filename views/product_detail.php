<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>CHI TIẾT SẢN PHẨM: <?= $product['name'] ?></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="<?= $product['image'] ?>" class="img-fluid rounded shadow-sm" alt="Product Image">
                    </div>
                    
                    <div class="col-md-8">
                        <h2 class="text-primary"><?= $product['name'] ?></h2>
                        <h3 class="text-danger fw-bold mb-3"><?= number_format($product['price']) ?> VNĐ</h3>
                        
                        <p><strong>Mã sản phẩm (ID):</strong> #<?= $product['id'] ?></p>
                        <p><strong>Mô tả:</strong> Đây là sản phẩm chính hãng chất lượng cao...</p>
                        
                        <hr>
                        <a href="index.php?page=product" class="btn btn-secondary">Quay lại danh sách</a>
                        <a href="#" class="btn btn-success">Đặt mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>