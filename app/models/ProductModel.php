<?php
class ProductModel extends Model
{
    public function getAllProducts()
    {
        // $sql = parent::$connection->prepare('SELECT * FROM products');
        
        // SELECT *, (SELECT COUNT(*) FROM product_user WHERE product_user.product_id = products.id) AS pLike FROM `products`

        $sql = parent::$connection->prepare('SELECT COUNT(product_user.product_id) AS pLike, products.* FROM `products` LEFT JOIN product_user ON products.id = product_user.product_id GROUP BY products.id');
        return parent::select($sql);
    }

    public function getCountProducts()
    {
        $sql = parent::$connection->prepare('SELECT COUNT(id) AS countProduct FROM `products`');
        return parent::select($sql)[0]['countProduct'];
    }

    public function getAllProductsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare('SELECT COUNT(product_user.product_id) AS pLike, products.* FROM `products` LEFT JOIN product_user ON products.id = product_user.product_id GROUP BY products.id LIMIT ?, ?');
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    

    
    public function getProductById($id)
    {
        $sql = parent::$connection->prepare('SELECT * FROM products WHERE id=?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    
    public function getProductByIds($arrId)
    {
        // $chamHoi = '';
        // for ($i=0; $i < count($arrId) - 1; $i++) { 
        //     $chamHoi .= '?,';
        // }
        $chamHoi = str_repeat('?,', count($arrId) - 1);
        $chamHoi .= '?';
        $i = str_repeat('i', count($arrId));

        $sql = parent::$connection->prepare("SELECT * FROM products WHERE id IN ( $chamHoi ) ORDER BY FIELD(id, $chamHoi) DESC");
        $sql->bind_param($i . $i, ...$arrId, ...$arrId);
        return parent::select($sql);
    }

    public function getProductByCategory($id)
    {
        $sql = parent::$connection->prepare('SELECT products.*
                                            FROM `products_categories`
                                            INNER JOIN products
                                            ON products_categories.product_id = products.id
                                            WHERE `category_id` = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    public function getProductsByKeyword($q)
    {
        $sql = parent::$connection->prepare('SELECT * FROM products WHERE product_name LIKE ?');
        $q = "%{$q}%";
        $sql->bind_param('s', $q);
        return parent::select($sql);
    }

    // INSERT
    public function addProduct($product_name, $product_description, $product_price, $product_photo)
    {
        $sql = parent::$connection->prepare('INSERT INTO `products`(`product_name`, `product_description`, `product_price`, `product_photo`) VALUES (?, ?, ?, ?)');
        $sql->bind_param('ssis', $product_name, $product_description, $product_price, $product_photo);
        return $sql->execute();
    }

    // UPDATE
    public function editProduct($product_name, $product_description, $product_price, $product_photo, $id)
    {
        $sql = parent::$connection->prepare('UPDATE `products` SET `product_name`=?,`product_description`=?,`product_price`=?,`product_photo`=? WHERE `id`=?');
        $sql->bind_param('ssisi', $product_name, $product_description, $product_price, $product_photo, $id);
        return $sql->execute();
    }
    // DELETE
    public function deleteProduct($id)
    {
        $sql = parent::$connection->prepare('DELETE FROM `products` WHERE `id`=?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }

    // UPDATE
    public function likeProductCookie($id)
    {
        $sql = parent::$connection->prepare('UPDATE `products` SET `product_like` = `product_like` + 1 WHERE `id`=?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }

    // INSERT
    public function likeProductUser($productId, $userId)
    {
        $sql = parent::$connection->prepare('INSERT INTO `product_user`(`product_id`, `user_id`) VALUES (?, ?)');
        $sql->bind_param('ii', $productId, $userId);
        return $sql->execute();
    }
}
