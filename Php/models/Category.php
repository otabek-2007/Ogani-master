<?php

class Category{
    public static function getCategory()
    {

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query("SELECT products.* ,categories.name  FROM products left join categories on categories.id = products.id");

        return $result->fetchAll();
    }
}