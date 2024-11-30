<?php require_once 'db.php'?>
<?php
    function read(){
        global $pdo;
        $result = $pdo->query("SELECT * FROM products");
        return $result->fetchAll();
    }
    function readByID($id){
        global $pdo;
        $result = $pdo->query("SELECT * FROM products WHERE id=".$id);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
?>