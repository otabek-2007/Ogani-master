<?php
require_once ROOT . '/models/Product.php';
include ROOT . '/models/Category.php';
include ROOT . '/models/UserPocket.php';
include ROOT . '/components/Pagination.php';
class CartController{

    public static function actionOrders($id){
        $counter = $_POST[''] ?? null;
        $submitBtn = $_POST['submit'] ?? null;
        // $pocketProducts = $_POST['quantity'] ?? null;
        // var_dump(Order::pushData($counter ,$submitBtn,$id));
        if(isset($submitBtn)){
            if(!isset($_SESSION['user'])){
                header( 'Location: /error');
            }
            // Order::pushData($id, $counter);
        }        
        $show = Product::show($id);
        $products = Product::getProducts();
        require_once ROOT . '/views/Products/shopDetails.php';
    }
    public static function actionCart(){         
        $products = Product::getProducts();
        $submitBtn = $_POST['submit'] ?? null;
        

        require_once ROOT . '/views/Products/shopCart.php';
    }

    public static function actionAddProduct(){
        $ids = $_POST['ids'] ?? [];
        var_dump($ids);
        $submitBtn = $_POST['submit'] ?? null;
        $user_id = $_SESSION['user']['id'];
        $db = Db::getConnection();
        if(isset($submitBtn)){
            
            $get_id_from_pag = $db->query('SELECT * FROM user_packages WHERE user_id = ' . $user_id);
            $get_ids = $get_id_from_pag->fetchAll();
            foreach($get_ids as $get_id){

                    foreach($ids as $id) {
                        
                        
                        $sql_package = 'INSERT INTO user_package_products(user_package_id, product_id )
                                        VALUES(:price)';
                        $result_package = $db->prepare($sql_package);                
                        $result_package->bindParam(':user_package_id', $get_id['id'], PDO::PARAM_INT);
                        // $result_package->bindParam(':price', $user_id, PDO::PARAM_INT);
                        $result_package->bindParam(':product_id', $id, PDO::PARAM_INT);
                        // $result_package->bindParam(':price', $id, PDO::PARAM_INT);
                        // $result_package->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                        $result_package->execute();
                        $result_package->fetch();        
                        
                        // // = = = =  = = = =  insert into source to user_packages = = = =  = = = = =  = //
                    }   
                    //  = = = = = = = = = = = end insert  = = = = = = = == = = = == = = == = == = = //
                    
                    
                    // = = = = = = = = == = = = insert into user_package_products = = = = = = = = == = = = // 
                }
                $sql = "INSERT INTO user_packages(user_id)
                        VALUES(:user_id)";
                $result = $db->prepare($sql);
                $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $result->execute();
                $result->fetch();        
            
        }
            
            require_once ROOT . '/views/Products/userPocket.php';
            

    }

}