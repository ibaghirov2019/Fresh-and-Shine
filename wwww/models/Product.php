<?php

/**
 * Product class - a model for working with goods
 */
class Product
{

    // Number of products displayed by default
    const SHOW_BY_DEFAULT = 10;


    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        // Connecting to the database
        $db = Db::getConnection();

        // The text of the query to the database
        $sql = 'SELECT id, name, price FROM product '
                . 'WHERE status = "1" ORDER BY id ASC '
                . 'LIMIT :count';

        // A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        // We indicate that we want to get data in the form of an array
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        // Performing the Command
        $result->execute();

        // Receiving and returning results
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Returns the list of products in the specified category
     */
    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $sql = 'SELECT id, name, price FROM product '
                . 'WHERE status = 1 AND category_id = :category_id '
                . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';

        // A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        // Receiving and returning results
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    /**
     * Returns the product with the specified id
     */
    public static function getProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    /**
     * Return the quantity of products in the specified category
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        // Connecting to the database
        $db = Db::getConnection();

        // The text of the query to the database
        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND category_id = :category_id';

        // A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        // Performing the Command
        $result->execute();

        // Return value count - number
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Returns a list of products with specified indentifiers
     */
    public static function getProdustsByIds($idsArray)
    {
        $db = Db::getConnection();

        // We turn the array into a string to form the condition in the query
        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        // We indicate that we want to get data in the form of an array
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }


    /**
     * Returns the path to the image
     */
    public static function getImage($id)
    {
        // No-image
        $noImage = 'no-image.jpg';

        // The path to the product folder
        $path = '/upload/images/products/';

        // The way to the product image jpeg
        $pathToProductImage = $path . $id . '.jpeg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // If the image for the product exists
            // Returning the path of the product image
            return $pathToProductImage;
        }

        // No image
        return $path . $noImage;
    }

}
