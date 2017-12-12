<?php

/**
 * ALL Services Controller 
 * 
 */
class AllServicesController
{

    /**
     * Action for the "Services ALL Services" page
     */
    public function actionIndex()
    {
        // List of categories for the left menu
        $categories = Category::getCategoriesList();

        // List of latest products
        $latestProducts = Product::getLatestProducts(12);

        // Connect the view
        require_once(ROOT . '/views/allservices/index.php');
        return true;
    }

    /**
     * Action for the "Product ALL Services" page
     */
    public function actionCategory($categoryId, $page = 1)
    {
        // List of categories for the left menu
        $categories = Category::getCategoriesList();

        // List of services in category
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        // Total quantity of goods
        $total = Product::getTotalProductsInCategory($categoryId);


        // Connect the view
        require_once(ROOT . '/views/allservices/category.php');
        return true;
    }

}
