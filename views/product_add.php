<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm" style="max-width: 600px; margin: 0 auto;">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Thêm sản phẩm mới</h4>
            </div>
            <div class="card-body">
                <form action="index.php?page=product-store" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" required placeholder="Ví dụ: iPhone 15">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giá (VNĐ)</label>
                        <input type="number" name="price" class="form-control" required placeholder="Ví dụ: 15000000">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Link hình ảnh</label>
                        <input type="text" name="image" class="form-control" placeholder="https://...">
                    </div>

                    <button type="submit" class="btn btn-success w-100">Lưu sản phẩm</button>
                    <a href="index.php?page=product" class="btn btn-secondary w-100 mt-2">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>