<?php require_once 'db.php';
    function DeleteProduct($id){
        global $pdo;
        $pdo->exec("DELETE FROM products WHERE id=".$id);
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        DeleteProduct($id);
        header("Location: ../main.php");
    }
    else{
        header("Location: ../main.php");
    } 
?>