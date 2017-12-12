<?php

/**
 * CartController
 */
class CartController
{

    /**
     * Action for adding goods to the basket with a synchronous request 
     */
    public function actionAdd($id)
    {
        // Adding goods to the basket
        Cart::addProduct($id);

        // Returning the user to the page with which he came
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    /**
     * Action to add goods to the shopping cart using an asynchronous request (ajax)
     */
    public function actionAddAjax($id)
    {
        // Add the product to the basket and print the result: the number of items in the cart
        echo Cart::addProduct($id);
        return true;
    }
    
    /**
     * Action to add a product to the shopping cart with a synchronous request
     */
    public function actionDelete($id)
    {
        // Remove the specified item from the cart
        Cart::deleteProduct($id);

        // Returning User to Shopping Cart
        header("Location: /cart");
    }

    /**
     * Action for the Shopping Cart
     */
    public function actionIndex()
    {
        // List of categories for the left menu
        $categories = Category::getCategoriesList();

        // Get the identifiers and the number of items in the cart
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // If the basket contains goods, we get full information about the goods for the list
            // Get the array only with product IDs
            $productsIds = array_keys($productsInCart);

            // Get an array with complete information about the necessary products
            $products = Product::getProdustsByIds($productsIds);

            // We get the total cost of goods
            $totalPrice = Cart::getTotalPrice($products);
        }

        // Connect the view
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    /**
     * Action for the "Make a purchase" page
     */
    public function actionCheckout()
    {
        // Receiving data from the shopping cart     
        $productsInCart = Cart::getProducts();

        // If there are no goods, we send users to search for products at home
        if ($productsInCart == false) {
            header("Location: /");
        }

        // List of categories for the left menu
        $categories = Category::getCategoriesList();

        // Find the total cost
        $productsIds = array_keys($productsInCart);
        $products = Product::getProdustsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        // Number of goods
        $totalQuantity = Cart::countItems();

        // Form Fields
        $userName = false;
        $userPhone = false;
        $userDay = false;
        $userTime = false;

        // Successful order status
        $result = false;

        // Check if the user is a guest
        if (!User::isGuest()) {
            // If it is not a Guest
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
            $userPhone = $user['mobnumber'];
        } else {
            // If is Guest
            $userId = false;
        }

        // Form processing
        if (isset($_POST['submit'])) {
            // If the form is sent
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userDay = $_POST['userDay'];
            $userTime = $_POST['userTime'];

            // Error flag
            $errors = false;

            // Field Validation
            if (!User::checkName($userName)) {
                $errors[] = 'Invalid name';
            }
            if (!User::checkMobNum($userPhone)) {
                $errors[] = 'Invalid phone number';
            }
            if (!User::checkDay($userDay)) {
                $errors[] = 'Invalid Day should be (01/01/2017)';
            }
            if (!User::checkTime($userTime)) {
                $errors[] = 'Invalid Time should be (09:41)';
            }


            if ($errors == false) {
                // If no errors
                $result = Order::save($userName, $userPhone, $userDay, $userTime, $userId, $productsInCart);
            }
        }

        // Connect the view
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }

}
