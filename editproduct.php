<?php
require_once './config/database.php';
spl_autoload_register(function ($className)
{
   require_once "./app/models/$className.php";
});

$productModel = new ProductModel();
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $item = $productModel->getProductById($id);
}

if(!empty($_POST['product_name']) && !empty($_POST['product_description']) && !empty($_POST['product_price']) &&!empty($_POST['product_photo']) ) {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_photo = $_POST['product_photo'];
    if($productModel->editProduct($product_name, $product_description, $product_price, $product_photo, $id)) {
        echo "Sửa thành công";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1>Edit product</h1>
        <form action="editproduct.php?id=<?php echo $item['id'] ?>" method="post">
            <div class="mb-3">
                <label for="product_name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $item['product_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="product_description" class="form-label">Mô tả</label>
                <input type="text" class="form-control" id="product_description" name="product_description" value="<?php echo $item['product_description'] ?>">
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">Giá</label>
                <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $item['product_price'] ?>">
            </div>
            <div class="mb-3">
                <label for="product_photo" class="form-label">Hình</label>
                <input type="text" class="form-control" id="product_photo" name="product_photo" value="<?php echo $item['product_photo'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>