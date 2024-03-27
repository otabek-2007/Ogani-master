<?php

class Product{
    const SHOW_BY_DEFAULT = 8;
    public static function getProducts($count = self::SHOW_BY_DEFAULT){
        intval($count);

        $db = Db::getConnection();

        $productList = array();

        $result = $db->query("SELECT 
                                products.id, 
                                products.name, 
                                products.weight, 
                                products.price, 
                                products.shipping, 
                                products.availability, 
                                products.category_id, 
                                products.is_featured,
                                CASE 
                                    WHEN upp.product_id IS NULL
                                    THEN false ELSE true
                                END as is_active
                            FROM products 
                            LEFT JOIN user_package_products as upp
                            ON upp.product_id = products.id
                            LEFT JOIN user_packages as up
                            ON up.id = upp.user_package_id
                            WHERE availability = true 
                            ORDER BY id DESC LIMIT " . $count);

        return $result->fetchAll();
    
    }
    public static function allProducts(){
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM products');

        return $result->fetchAll();

    }
    public static function show($id){
        $db = Db::getConnection();
    
        $result = $db->query('SELECT * FROM products 
                              WHERE id = '.$id.'');

        return $result->fetchAll();
    }
  
    public static function isFeatured(){

        $db = Db::getConnection();

        $productList = array();

        $result = $db->query("SELECT 
                                products.id, 
                                products.name, 
                                products.weight, 
                                products.price, 
                                products.shipping, 
                                products.availability, 
                                products.category_id, 
                                products.is_featured,
                                CASE 
                                    WHEN upp.product_id IS NULL
                                    THEN false ELSE true
                                END as is_active
                            FROM products 
                            LEFT JOIN user_package_products as upp
                            ON upp.product_id = products.id
                            LEFT JOIN user_packages as up
                            ON up.id = upp.user_package_id
        WHERE is_featured = true and status = true");
        return $result->fetchAll();
    
    }
    public static function cart($prdId){
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM products 
        WHERE id = '.$prdId.'');

        return $result->fetchAll();
    }
    public static function isLatest(){
        
        $db = Db::getConnection();

        $productList = array();

        $result = $db->query("SELECT * 
        FROM products 
        WHERE status = true and is_latest = true");
        return $result->fetchAll();
    }
    public static function saleOff(){
 
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM products
        WHERE saleOff > 0 and status = true
        
        ');
        return $result->fetchAll();
    }
    public static function isReview(){
        
        $db = Db::getConnection();

        $productList = array();

        $result = $db->query("SELECT id, name, price,  availability, category_id, is_featured, is_review 
        FROM products 
        WHERE status = true and is_review = true");
        return $result->fetchAll();
    }
    public static function isRated(){
        
        $db = Db::getConnection();

        $productList = array();

        $result = $db->query("SELECT id, name, price,  availability, category_id, is_featured, is_rated
        FROM products 
        WHERE status = true and is_rated = true");
        return $result->fetchAll();
    }

}