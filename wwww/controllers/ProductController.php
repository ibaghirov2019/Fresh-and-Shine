<?php

/**
 * ProductController
 */
class ProductController
{

    /**
     * Action for the product view page
     */
    public function actionView($productId)
    {
        // List of categories for the left menu
        $categories = Category::getCategoriesList();

        // Get the information about the product
        $product = Product::getProductById($productId);

        // Connect the view
        require_once(ROOT . '/views/product/view.php');
        return true;
    }

}
