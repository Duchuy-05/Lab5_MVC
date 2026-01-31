<?php
// KIỂM TRA LOGIC: Đang là chế độ Sửa hay Thêm?
// Nếu biến $product tồn tại => Đang Sửa. Ngược lại => Đang Thêm.
$isEdit = isset($product); 

// Cấu hình các giá trị thay đổi theo chế độ
$title      = $isEdit ? "SỬA SẢN PHẨM #{$product['id']}" : "THÊM SẢN PHẨM MỚI";
$bgClass    = $isEdit ? "bg-warning text-dark" : "bg-success text-white";
$btnClass   = $isEdit ? "btn-warning" : "btn-success";
$btnText    = $isEdit ? "Cập nhật ngay" : "Lưu sản phẩm";

// Xác định đường dẫn gửi form (Action)
$formAction = $isEdit 
    ? "index.php?page=product-update&id={$product['id']}" 
    : "index.php?page=product-store";

// Giá trị mặc định cho các ô input (Nếu thêm mới thì rỗng)
$name  = $isEdit ? $product['name'] : '';
$price = $isEdit ? $product['price'] : '';
$image = $isEdit ? $product['image'] : '';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= $isEdit ? 'Cập nhật sản phẩm' : 'Thêm sản phẩm' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow" style="max-width: 600px; margin: 0 auto;">
            
            <div class="card-header <?= $bgClass ?>">
                <h4 class="mb-0"><?= $title ?></h4>
            </div>

            <div class="card-body">
                <form action="<?= $formAction ?>" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" 
                               value="<?= $name ?>" required placeholder="Ví dụ: iPhone 15">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Giá bán (VNĐ)</label>
                        <input type="number" name="price" class="form-control" 
                               value="<?= $price ?>" required placeholder="Ví dụ: 15000000">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Link hình ảnh</label>
                        <input type="text" name="image" class="form-control" 
                               value="<?= $image ?>" placeholder="https://...">
                        
                        <?php if ($isEdit && !empty($image)): ?>
                            <div class="mt-2 p-2 border rounded bg-white text-center">
                                <small class="d-block text-muted mb-1">Ảnh hiện tại:</small>
                                <img src="<?= $image ?>" style="height: 100px; object-fit: contain;">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="index.php?page=product" class="btn btn-secondary">Quay lại</a>
                        <button type="submit" class="btn <?= $btnClass ?> px-4 fw-bold">
                            <?= $btnText ?>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>