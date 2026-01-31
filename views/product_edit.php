<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhật sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow" style="max-width: 600px; margin: 0 auto;">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">SỬA SẢN PHẨM #<?= $product['id'] ?></h4>
            </div>
            <div class="card-body">
                
                <form action="index.php?page=product-update&id=<?= $product['id'] ?>" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" 
                               value="<?= $product['name'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Giá bán (VNĐ)</label>
                        <input type="number" name="price" class="form-control" 
                               value="<?= $product['price'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Link hình ảnh</label>
                        <input type="text" name="image" class="form-control" 
                               value="<?= $product['image'] ?>">
                        
                        <div class="mt-2 p-2 border rounded bg-white text-center">
                            <small class="d-block text-muted mb-1">Ảnh hiện tại:</small>
                            <img src="<?= $product['image'] ?>" style="height: 100px; object-fit: contain;">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="index.php?page=product" class="btn btn-secondary">Hủy bỏ</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">Cập nhật ngay</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>