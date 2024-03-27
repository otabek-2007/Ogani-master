<?php
include ROOT . '/models/Category.php';
include ROOT . '/models/Product.php';
class CategoryController{
    public static function actionCategory(){

        $categories = Category::getCategory();
        
        return require_once ROOT . '/views/categories/categories.php';
    }
    
}