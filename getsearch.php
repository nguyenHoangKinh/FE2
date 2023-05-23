<?php
require_once './config/database.php';
spl_autoload_register(function ($className)
{
   require_once "./app/models/$className.php";
});
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $input['keyword'];
    $productModel = new productModel();
    $productList = $productModel->getProductsByKeyword($id);

    echo json_encode($productList);
?>

