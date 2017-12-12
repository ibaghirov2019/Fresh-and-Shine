<?php

return array(
    // Service:
    'product/([0-9]+)' => 'product/view/$1', // actionView in ProductController

    // All services:
    'allservices' => 'allservices/index', // actionIndex in AllServicesController

    // // Category of goods:
    'category/([0-9]+)/page-([0-9]+)' => 'allservices/category/$1/$2', // actionCategory in All Services Controller   
    'category/([0-9]+)' => 'allservices/category/$1', // actionCategory in CatalogController
    
    // Shoppig Cart:
    'cart/checkout' => 'cart/checkout', // actionAdd in CartController    
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete in CartController    
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd in CartController    
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax in CartController
    'cart' => 'cart/index', // actionIndex in CartController
    
    // User:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    // About Website
    'contacts' => 'site/contact',
    'about' => 'site/about',
    'team' => 'site/team',
   
    
    // Home Page
    'index.php' => 'site/index', // actionIndex in SiteController
    '' => 'site/index', // actionIndex in SiteController
);
