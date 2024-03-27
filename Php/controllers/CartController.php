<?php
require_once ROOT . '/models/Product.php';
include ROOT . '/models/Category.php';
include ROOT . '/models/UserPocket.php';
include ROOT . '/components/Pagination.php';
include ROOT . '/models/Cart.php';
class CartController{

    public static function actionOrders($id){

        $show = Product::show($id);
        $products = Product::getProducts();
        //= = = = = = = =  shop details = = = = = = = = //
        $db = Db::getConnection(); 
        $counterDetails = $_POST['counterDetails'] ?? null;
        $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;
        $submitBtnDetails = $_POST['submitDetails'] ?? null;
        // return var_dump($submitBtnDetails);

        if (isset($user_id)) {
            if (isset($submitBtnDetails)) {
                $userPackage = $db->query("SELECT * FROM user_package_products WHERE product_id = $id LIMIT 1");
                        if ($userPackage->fetch()) {
                            // found
                            $sql = $db->query('SELECT * FROM user_package_products WHERE product_id = ' . $id);
                            if($sql->fetch()){
                                Cart::update_details($id, $user_id, $counterDetails);
                            } else{
                                Cart::store_details($id, $user_id, $counterDetails);
                            }
                        } else {
                            // echo 'not found';
                            Cart::store_user();
                            Cart::store_details($id, $user_id, $counterDetails);
                        } 
                // header('Location: /userPocket');
                
            }
            
        }
        require_once ROOT . '/views/Products/shopDetails.php';

    }
    public static function actionCart(){         
        $products = Product::getProducts();
        require_once ROOT . '/views/Products/shopCart.php';
    }

    public static function actionUserPocket(){
        $counterPocket = $_POST['counterPocket'] ?? 0;
        $submitBtn = $_POST['submitCart'] ?? null;
        $pocket_items = Cart::Order();
        
        if(isset($submitBtn)){
            header('Location: /shopCart');
        }
        
        return require_once ROOT . '/views/Products/userPocket.php';
        
    }
    
    public static function actionAddProduct() {
        $db = Db::getConnection();
        $typeAdd = $_POST['typeAdd'] ?? null;
        $typeDel = $_POST['typeDel'] ?? null;
        $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;
        $counterPocket = $_POST['counterPocket'] ?? null;
        $submitBtn = $_POST['submitCart'] ?? null;
        $products = $_POST['products'] ?? [];
        $db = Db::getConnection();

        
        if ($user_id) {
            

            if(isset($submitBtn)){
                Cart::delete_package($products);
                Cart::delete_user_package();
           
            }
            if (!empty($products)) {
                // position add
                
                if (isset($typeAdd)) {
                        $userPackage = $db->query("SELECT * FROM user_packages WHERE user_id = $user_id LIMIT 1");
                        if ($userPackage->fetch()) {
                            foreach($products as $id){
                                
                                $sql = $db->query('SELECT * FROM user_package_products WHERE product_id = ' . $id['id']);
                                if($sql->fetch()){
                                    Cart::update($products, $user_id);
                                } else{
                                Cart::store($products, $user_id);
                                }
                            }
                        } else {
                            // echo 'not found';
                            Cart::store_user();
                            Cart::store($products, $user_id);
                        } 
                    

                } 
                if(isset($typeDel)) {
                    $userPacId = $db->query('SELECT * FROM user_packages WHERE user_id = '.$user_id);
                    $user_id_pac = $userPacId->fetch();
                    $userPac = $db->query("SELECT * FROM user_package_products WHERE user_package_id = ".$user_id_pac['id']);
                    if ($userPac->fetch()) {
                        Cart::delete_package($products);
                        Cart::delete_user_package();
                    }else {
                        Cart::delete_package($products);
                    }
                }
               


                return true;

            } 
        } else {
            /** 
             * some error that user_id is null! 
             */
            header( 'Location: /error');

            
        }
        return true;
    }

}