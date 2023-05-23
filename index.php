<?php
require_once './config/database.php';
spl_autoload_register(function ($className) {
    require_once "./app/models/$className.php";
});
session_start();

$productModel = new ProductModel();
// Like
if (isset($_POST['likedId'])) {
    $id = $_POST['likedId'];

    $userId = $_SESSION['userId'];
    $productModel->likeProductUser($id, $userId);
}

// Lấy danh sách product

$productList = $productModel->getAllProducts();
$viewedProductList = [];
if (isset($_COOKIE['viewedProduct'])) {
    $arrId = json_decode($_COOKIE['viewedProduct'], true);
    $viewedProductList = $productModel->getProductByIds($arrId);
}


$categoryModel = new CategoryModel();
$categoryList = $categoryModel->getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <style>
        .boxSearch {
            position: absolute;
            background: #bdbebd;
            width: 700px;
            right: 0;
        }

        .value_search {
            background: white;
            margin: 5px 0;
        }

        .value_search img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <?php
                    foreach ($categoryList as $item) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?id=<?php echo $item['id']; ?>"><?php echo $item['category_name']; ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <form class="d-flex" role="search" action="search.php" method="get">
                    <input oninput="getSearch(this)" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q" id="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

    </nav>
    <div class="boxSearch">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <button class="get-products">Get All Products</button>
                <div class="loader">
                    <div class="cricle"></div>
                    <div class="cricle"></div>
                    <div class="cricle"></div>
                    <div class="cricle"></div>
                </div>
                <div class="row" id="table">
                </div>
            </div>
            <div class="col-md-4">
                Chi sản phẩm
                <div class="product_detail"></div>
            </div>
            <div class="col-md-2 bg-info">
                <h5>VỪA XEM</h5>
                <!-- <?php
                        foreach ($viewedProductList as $viewedItem) {
                        ?>
                    <div class="card">
                        <a href="product.php?id=<?php echo $viewedItem['id']; ?>"><img class="card-img-top" src="public/images/<?php echo $viewedItem['product_photo']; ?>" alt="Card image cap"></a>
                        <div class="card-body">
                            <a href="product.php?id=<?php echo $viewedItem['id']; ?>">
                                <h6 class="card-title"><?php echo $viewedItem['product_name']; ?></h6>
                            </a>

                        </div>
                    </div>
                <?php
                        }
                ?> -->
            </div>
        </div>


    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="./public/js/app.js"></script>
</body>

</html>