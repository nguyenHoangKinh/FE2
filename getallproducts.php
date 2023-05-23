<?php
require_once './config/database.php';
spl_autoload_register(function ($className)
{
   require_once "./app/models/$className.php";
});
session_start();

$productModel = new ProductModel();

// Lấy danh sách product
$productList = $productModel->getAllProducts();
echo json_encode($productList);
?>