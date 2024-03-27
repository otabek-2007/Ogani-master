<?php
include ROOT . '/models/Product.php';
include ROOT . '/models/Order.php';
include ROOT . '/models/Cart.php';
include ROOT . '/models/Category.php';
include ROOT . '/components/Pagination.php';

class SiteController
{
    public static function actionIndex()
    { 
        $categories = Category::getCategory();
        $products = Product::getProducts();
        $isFeatured = Product::isFeatured();
        $isLatest = Product::isLatest();
        $isReview = Product::isReview();
        $isRated = Product::isRated();

        // echo '<pre>';
        // var_dump($isFeatured);
        // echo '</pre>';
        $user_id = $_SESSION['user']['id'];
        if(is_null($user_id)){
            header("Location: /error");

        } else{
            $count_items = Cart::count_item($user_id);
        }
        $pagination = Pagination::Pagination();
        
        return require_once ROOT . '/views/index.php';

    }

}
