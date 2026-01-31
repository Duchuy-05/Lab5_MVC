<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">DANH SÁCH SẢN PHẨM</h4>
            <a href="index.php?page=product-add" class="btn btn-light btn-sm fw-bold text-primary">
                <i class="fa-solid fa-plus"></i> Thêm mới
            </a>
        </div>
        <div class="card-body">
            <form action="index.php" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="hidden" name="page" value="product">
                    
                    <input type="text" name="keyword" class="form-control" 
                           placeholder="Nhập tên sản phẩm cần tìm..." 
                           value="<?= $_GET['keyword'] ?? '' ?>">
                    
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm
                    </button>
                    
                    <a href="index.php?page=product" class="btn btn-secondary">Đặt lại</a>
                </div>
            </form>
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th> 
                        
                        <th style="width: 100px;">Hình ảnh</th> 
                        
                        <th>Tên sản phẩm</th> 
                        
                        <th>Giá</th> 
                        
                        <th class="text-center">Hành động</th> 
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($products as $product): ?>
                            <?php 
                                $rowClass = ''; // Mặc định không màu
                                if ($product['price'] >= 30000000) {
                                    $rowClass = 'table-danger'; // Giá cao thì màu đỏ
                                } elseif ($product['price'] < 15000000) {
                                    $rowClass = 'table-success'; // Giá rẻ thì màu xanh
                                }
                            ?>

                            <tr class="<?= $rowClass ?>">
                                
                                <td><?= $product['id'] ?></td>
                                
                                <td>
                                    <img src="<?= $product['image'] ?>" class="img-thumbnail" style="width: 80px;">
                                </td>
                                
                                <td class="fw-bold">
                                    <a href="index.php?page=product-detail&id=<?= $product['id'] ?>" class="text-decoration-none text-dark">
                                        <?= $product['name'] ?>
                                    </a>
                                </td>
                                
                                <td class="text-danger fw-bold">
                                    <?= number_format($product['price']) ?> VND
                                </td>
                                
                                <td class="text-center">
                                    <a href="index.php?page=product-edit&id=<?= $product['id'] ?>" class="btn btn-warning btn-sm me-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Sửa
                                    </a>
                                    
                                    <a href="index.php?page=product-delete&id=<?= $product['id'] ?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này chứ?')">
                                    <i class="fa-solid fa-trash"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>