<?php

/**
 * Site Controller
 */
class SiteController
{

    public function actionIndex()
    {
        // List of categories for the left menu
        $categories = Category::getCategoriesList();

        // List of latest products
        $latestProducts = Product::getLatestProducts(6);

        // Connect the view
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

     /**
     * Action for the Contacts page
     */
     public function actionContact()
     {

        // Connect the view
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }
     /**
     * Action for the Search page
     */
     public function actionSearch()
     {

        // Connect the view
        require_once(ROOT . '/views/site/search.php');
        return true;
    }
    
    /**
     * Action for the About page
     */
    public function actionAbout()
    {
        // Connect the view
        require_once(ROOT . '/views/site/about.php');
        return true;
    }

    /**
     * Action for the Team page
     */
    public function actionTeam()
    {
        // Connect the view
        require_once(ROOT . '/views/site/team.php');
        return true;
    }

    
}
