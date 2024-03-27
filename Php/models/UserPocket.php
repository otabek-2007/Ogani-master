<?php  

class UserPocket {

    public static function userPocket()
    {
        $userId = $_SESSION['user']['id'];
        $products = array();
        $db = Db::getConnection();

        $sqlProduct = $db->query("SELECT userPag.id, 
            userPag.product_id, 
            userPag.price, 
            userPag.quantity, 
            products.name 
            FROM user_package_products 
            as userPag
            LEFT JOIN products ON products.id = userPag.product_id
            JOIN user_packages ON user_packages.id = userPag.user_package_id
            WHERE user_packages.user_id = " . $userId
            
        );

        return $sqlProduct->fetchAll();

        
    }
    public static function insertProducts(){
        
        $userId = $_SESSION['user']['id'];

        
        $db = Db::getConnection();
        

    }
 
}