<?php
require_once './config/database.php';
spl_autoload_register(function ($className)
{
   require_once "./app/models/$className.php";
});
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $input['productId'];
    $productModel = new productModel();
    $item = $productModel->getProductById($id);

echo json_encode($item);
?>