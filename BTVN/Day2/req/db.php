<?php
define('HOST', '127.0.0.1');
define('DB', 'products');
define('USER', 'root');
define('PASS', '');
define('CHARSET', 'utf8mb4');

$dsn = "mysql:host=".HOST.";dbname=".DB.";charset=".CHARSET;
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, USER, PASS, $options);
    //  echo "Kết nối thành công!";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>