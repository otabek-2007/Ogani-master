<?php

class Cart
{
    public static function store($products, $user_id)
    {
        $db = Db::getConnection();

        foreach ($products as $prd) {
            $productPrice = $db->query("SELECT price FROM products WHERE id = " . $prd['id']);
            $price = $productPrice->fetch()['price'] ?? 0;
            $productInsertSql =
                "INSERT INTO 
                    user_package_products (user_package_id, product_id, price, quantity) 
                VALUES 
                    (:user_package_id, :product_id, :price, :quantity)";
            $userPackage = $db->query("SELECT * FROM user_packages WHERE user_id = $user_id LIMIT 1");
            $user_id_column = $userPackage->fetch();
            // var_dump($user_id_column['id']);
            $result = $db->prepare($productInsertSql);
            $result->bindParam(':user_package_id', $user_id_column['id'], PDO::PARAM_INT);
            $result->bindParam(':product_id', $prd['id'], PDO::PARAM_INT);
            $result->bindParam(':price', $price, PDO::PARAM_STR);
            $result->bindParam(':quantity', $prd['quantity'], PDO::PARAM_INT);
            return $result->execute();

        }
    }
    public static function store_details($id, $user_id, $counterDetails)
    {
        $db = Db::getConnection();

            // foreach( as $id){
                $productPrice = $db->query("SELECT price FROM products WHERE id = " . $id);
                $price = $productPrice->fetch()['price'] ?? 0;
                $productInsertSql =
                    "INSERT INTO 
                        user_package_products (user_package_id, product_id, price, quantity) 
                    VALUES 
                        (:user_package_id, :product_id, :price, :quantity)";
                $userPackage = $db->query("SELECT * FROM user_packages WHERE user_id = $user_id");
                $user_id_column = $userPackage->fetch();
                // var_dump($user_id_column['id']);
                $result = $db->prepare($productInsertSql);
                $result->bindParam(':user_package_id', $user_id_column['id'], PDO::PARAM_INT);
                $result->bindParam(':product_id', $id, PDO::PARAM_INT);
                $result->bindParam(':price', $price, PDO::PARAM_STR);
                $result->bindParam(':quantity',$counterDetails , PDO::PARAM_INT);
                return $result->execute();
            // }
    
        // return true;
    }
    public static function Order()
    {
        $db = Db::getConnection();

        $sql = $db->query('SELECT * FROM user_package_products  LEFT JOIN products ON products.id = user_package_products.product_id');
        return $sql->fetchAll();
    }
    public static function delete_package($products)
    {
        $db = Db::getConnection();

        foreach ($products as $prd) {
            $userPackageDelete = ('DELETE FROM `user_package_products` WHERE product_id = :product_id');
            $packageDelete = $db->prepare($userPackageDelete);
            $packageDelete->bindParam(':product_id', $prd['id'], PDO::PARAM_INT);
            return $packageDelete->execute();
        }
        // return true;

    }
    public static function delete_user_package()
    {
        $user_id = $_SESSION['user']['id'];
        $db = Db::getConnection();
        $userPackageDelete = ('DELETE FROM `user_packages` WHERE user_id = :user_id');
        $packageDelete = $db->prepare($userPackageDelete);
        $packageDelete->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $packageDelete->execute();

    }
    public static function store_user()
    {
        $db = Db::getConnection();

        $user_id = $_SESSION['user']['id'];

        $insert_user_sql = 'INSERT INTO 
                                user_packages(user_id)
                            VALUES
                                (:user_id)';
        $result = $db->prepare($insert_user_sql);

        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $result->execute();
        // $result->fetch();
    }

    public static function details_package($id, $counterDetails, $user_id)
    {
        $db = Db::getConnection();
       
            $productPrice = $db->query("SELECT price FROM products WHERE id = " . $id);
            $price = $productPrice->fetch()['price'] ?? 0;
            $productInsertSql =
                "INSERT INTO 
                    user_package_products (user_package_id, product_id, price, quantity) 
                VALUES 
                    (:user_package_id, :product_id, :price, :quantity)";
            $userPackage = $db->query("SELECT * FROM user_packages WHERE user_id = $user_id LIMIT 1");
            $user_id_column = $userPackage->fetch();
            // var_dump($user_id_column['id']);
            $result = $db->prepare($productInsertSql);
            $result->bindParam(':user_package_id', $user_id_column['id'], PDO::PARAM_INT);
            $result->bindParam(':product_id', $id, PDO::PARAM_INT);
            $result->bindParam(':price', $price, PDO::PARAM_INT);
            $result->bindParam(':quantity', $counterDetails, PDO::PARAM_INT);
            return $result->execute();
        
    }

    public static function update_details($id, $user_id, $counterDetails){
        $db = Db::getConnection();

        $user = $db->query('SELECT id FROM user_packages WHERE user_id = ' . $user_id);
        $get_id = $user->fetch();
        // foreach ($products as $id) {
            $get_price = $db->query('SELECT price FROM user_package_products WHERE product_id = ' . $id);
            $price = $get_price->fetch();
            
            $update_sql = 'UPDATE user_package_products
                            SET 
                            user_package_id = :user_package_id,
                            product_id = :product_id,
                            price = :price, 
                            quantity = :quantity
                            WHERE product_id = '.$id;
            $update_data = $db->prepare($update_sql);
            $update_data->bindParam(':user_package_id', $get_id['id'], PDO::PARAM_INT);
            $update_data->bindParam(':product_id', $id , PDO::PARAM_INT);
            $update_data->bindParam(':price', $price, PDO::PARAM_INT);
            $update_data->bindParam(':quantity', $counterDetails, PDO::PARAM_INT);
            return $update_data->execute();
        // }

    }
    public static function count_item($user_id){
        $db = Db::getConnection();
        
        $user_package_id = $db->query('SELECT id FROM user_packages WHERE user_id = '.$user_id);
        $user_result_id = $user_package_id->fetch();

        $sql = $db->query("SELECT COUNT(id) as count FROM user_package_products WHERE user_package_id = ".$user_result_id['id']);
        return $sql->fetch();
    }
    public static function update($products, $user_id){
        $db = Db::getConnection();

        $user = $db->query('SELECT id FROM user_packages WHERE user_id = ' . $user_id);
        $get_id = $user->fetch();
        foreach ($products as $id) {
        
            $get_price = $db->query('SELECT price FROM user_package_products WHERE product_id = ' . $id['id']);
            $price = $get_price->fetch();
            $update_sql = 'UPDATE user_package_products
                        SET 
                        user_package_id = :user_package_id,
                        product_id = :product_id,
                        price = :price, 
                        quantity = :quantity
                        WHERE product_id = '.$id['id'];
        $update_data = $db->prepare($update_sql);
        $update_data->bindParam(':user_package_id', $get_id['id'], PDO::PARAM_INT);
        $update_data->bindParam(':product_id', $id['id'] , PDO::PARAM_INT);
        $update_data->bindParam(':price', $price, PDO::PARAM_INT);
        $update_data->bindParam(':quantity', $id['quantity'], PDO::PARAM_INT);
        return $update_data->execute();
    }

    }
}