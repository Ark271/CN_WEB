<?php
include 'db.php';

if (isset($_POST['id']) && isset($_POST['product_name']) && isset($_POST['price'])) {
    $id = $_POST['id'];
    $p_name = $_POST['product_name'];
    $price = $_POST['price'];

    // Kiểm tra dữ liệu nhập vào
    if (empty($p_name) || empty($price)) {
        die("Vui lòng nhập đầy đủ thông tin!");
    }

    if (!is_numeric($price) || $price <= 0) {
        die("Giá sản phẩm không lệ!");
    }

    // Chuẩn bị truy vấn an toàn
    try {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE products SET product_name = :product_name, price = :price WHERE id = :id");
        $stmt->execute([
            'product_name' => $p_name,
            'price' => $price,
            'id' => $id
        ]);
        header("Location: ../main.php"); // Chuyển hướng về trang chính
        exit;
    } catch (PDOException $e) {
        die("Lỗi: " . $e->getMessage());
    }
} else {
    die("Thiếu dữ liệu cần thiết!");
}
?>