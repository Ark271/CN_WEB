<?php 
    include 'db.php';
    if(isset($_POST['product_name']) && isset($_POST['price'])){
        global $pdo;
        $p_name = $_POST['product_name'];
        $price = $_POST['price'];
        $stmt = $pdo->prepare("INSERT INTO products (product_name, price) VALUES (:product_name, :price)");
        $stmt->execute([
            ':product_name' => $p_name,
            ':price' => $price
        ]);

        header("Location: ../main.php");
    }
    else{
        die('Xảy ra lỗi');
    }
?>