<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Add</title>
    <style>
        body {
            height: 100vh;
        }
    </style>
</head>
<body>
    <main>
        <?php include 'header.php'; ?>
        <div class="container d-flex justify-content-center align-items-center h-100">
            <?php
                include "req/read.php";
                if(isset($_GET['id'])){
                    $p = readByID($_GET['id']);
                }
            ?>
            <form class="w-50 bg-light p-4 rounded" action="req/update.php" method="POST">
                <div class="mb-3 row">
                    <label for="p_name" class="col-sm-3 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="p_name" name="product_name" placeholder="Nhập tên sản phẩm"
                        value="<?= $p['product_name'];?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-3 col-form-label">Giá sản phẩm</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm"
                        value="<?= $p['price'];?>">
                    </div>
                </div>
                <input type="text" name="id" hidden value="<?= $p['id']?>">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success" type="submit">Xác nhận</button>
                </div>
            </form>
        </div>
        <?php include 'footer.php'; ?>
    </main>
</body>
</html>