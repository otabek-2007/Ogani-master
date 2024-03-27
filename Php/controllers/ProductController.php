<?php
require_once ROOT . '/models/Product.php';
include ROOT . '/models/Category.php';
include ROOT . '/components/Pagination.php';

class ProductController {
    public static function actionShopGrid(){
        $products = Product::getProducts();
      
        $isFeatured = Product::isFeatured();
        $isLatest = Product::isLatest();
        $isReview = Product::isReview();
        $isRated = Product::isRated();
        $saleOff = Product::saleOff();
        $allProducts = Product::allProducts();

        return require_once ROOT . '/views/Products/shopGrid.php';
    }
}