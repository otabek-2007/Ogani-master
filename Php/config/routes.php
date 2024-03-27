<?php

return array(
    // 'cart/addProduct/([0-9]+)' => 'cart/addProduct/$1', // actionAdd в CartController

    'register' => 'user/register',
    'login' => 'user/login', // UserController => actionLogin 
    'shopDetails/([0-9]+)' => 'Cart/orders/$1',
    'shopDetails' => 'Cart/orders',
    'page/([0-9]+)' => 'Pagination/setPagination',
    'shopGrid' => 'Product/shopGrid',
    'shopCart/([0-9]+)' => 'cart/cart/$1',
    'shopCart' => 'cart/cart',
    'category' => 'category/category',
    'error' => 'user/error',
    'index' => 'site/index', 
    'pocket' => 'cart/AddProduct',
    'userPocket' => 'cart/userPocket',
    // 'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController    
    'cart' => 'cart/index', // actionIndex в CartController
    '' => 'site/index', 
);