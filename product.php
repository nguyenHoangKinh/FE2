<?php
require_once './config/database.php';
spl_autoload_register(function ($className)
{
   require_once "./app/models/$className.php";
});

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $productModel = new productModel();
    $item = $productModel->getProductById($id);
    
    if(!isset($_COOKIE['viewedProduct'])) {
        $value = [$id];
        setcookie('viewedProduct', json_encode($value), time() + 3600);
    }
    else {
        $viewedProduct = json_decode($_COOKIE['viewedProduct'], true);
        // $viewedProduct = explode(',', $_COOKIE['viewedProduct']);
        var_dump($viewedProduct);
        if(!in_array($id, $viewedProduct)) {
            if(count($viewedProduct) == 5) {
                array_shift($viewedProduct);
            }
        }
        else {
            unset($viewedProduct[array_search($id, $viewedProduct)]);
        }
        array_push($viewedProduct, $id);
        setcookie('viewedProduct', json_encode($viewedProduct), time() + 3600);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $item['product_name']; ?></title>
    <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php
                $photos = explode(',', $item['product_photo']);
                foreach ($photos as $photo) {
                ?>
                <img src="<?php echo $photo; ?>" alt="" class="img-fluid">
                <?php
                }
                ?>
            </div>
            <div class="col-md-8">
                <h1><?php echo $item['product_name']; ?></h1>
                <p><?php echo $item['product_price']; ?></p>
                <p><?php echo $item['product_description']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>