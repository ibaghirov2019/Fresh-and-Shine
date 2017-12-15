<?php

/**
 * Class Shopping Cart
 */
class Cart
{

    /**
     * Adding goods to the basket
     */
    public static function addProduct($id)
    {
        // We bring $ id to type integer
        $id = intval($id);


        // Empty array for items in the cart
        $productsInCart = array();

        // If the basket already has the goods (they are stored in the session)
        if (isset($_SESSION['products'])) {
            //Then fill out our array of goods
            $productsInCart = $_SESSION['products'];
        }

        // Check if there is already such a product in the basket
        if (array_key_exists($id, $productsInCart)) {
            // If such a product is in the basket, but has been added again, we will increase the quantity by 1
            // $productsInCart[$id] += $_POST['size'];
        } 
        else {
            // If not, add the id of the new product to the cart with the quantity 1
            $productsInCart[$id] = $_POST['size'];
        }

        // Write an array of goods in the session
        $_SESSION['products'] = $productsInCart;

        // Return the number of items in the cart
        return self::countItems();
    }

    /**
     * Counting the number of items in the basket 
     */
    public static function countItems()
    {
        // Checking the availability of goods in the shopping cart
        if (isset($_SESSION['products'])) {
            // Count and return their number
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + ($quantity / $quantity);
            }
            return $count;
        } else {
            return 0;
        }
    }

    /**
     * Returns an array with the identifiers and the number of items in the cart
     */
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    /**
     * We get the total cost of the goods transferred
     */
    public static function getTotalPrice($products)
    {
        // Get an array with the identifiers and the number of items in the cart
        $productsInCart = self::getProducts();

        // We calculate the total cost
        $total = 0;
        if ($productsInCart) {
            // If the basket is not empty
            foreach ($products as $item) {
                // Find the total cost: the price of the product * the quantity of the goods
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    /**
     * Clears the basket
     */
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    /**
     * Deletes an item with the specified id from the shopping cart
     */
    public static function deleteProduct($id)
    {
        // Get an array with the identifiers and the number of items in the cart
        $productsInCart = self::getProducts();

        // We remove from the array the element with the specified id
        unset($productsInCart[$id]);

        // Write an array of goods with the deleted item in the session
        $_SESSION['products'] = $productsInCart;
    }

}
