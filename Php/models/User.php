<?php

class User{

    public static function register($name, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $db = Db::getConnection();
        $sql = "INSERT INTO users (name, email, password)
                VALUES (:name, :email, :password)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        if($result->execute()) {
            $getLastUserSql = "SELECT id, name, email FROM users ORDER BY created_at DESC LIMIT 1";
            $user = $db->prepare($getLastUserSql);
            $user->setFetchMode(PDO::FETCH_ASSOC);
            $user->execute();
            $_SESSION['user'] = $user->fetch();
            return true;
        }
        return false;
    }
    public static function userInsertPocket(){

        $userId = $_SESSION['user']['id'];

        $db = Db::getConnection();

        $sql = 'INSERT INTO user_packages(user_id)
                VALUES(:user_id)';
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }
    public static function checkName($name)
    {
        if(strlen($name) >= 4) {
            return true;
        }
        return false;
    }
    public static function checkPassword($password, $passwordConfirm){
        if(strlen($password) >= 6 && $password == $passwordConfirm ){
            return true;
        }
        return false;
    }
    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    public static function checkEmailExists($email){
        $db = Db::getConnection();

        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";

        $result = $db->prepare($sql);

        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn()){
            return true;
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }
    
    public static function data(){
        $db = Db::getConnection();

        $sql = "SELECT id, name, email FROM users ORDER BY created_at DESC LIMIT 1";
        $_SESSION['user'] = $sql;
        print_r($sql);
        // var_dump($_SESSION['user']['email']);

    } 

    public static function Login($email, $password){
        $db = Db::getConnection();
        $sql = "SELECT id,email, password, name FROM users WHERE email = :email";
        $result = $db->prepare($sql);   

        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        // Указываем, что хотим получить данные в виде массива
        if($user) {
            $isPassOk = password_verify($password, $user['password']);
            if ($isPassOk) {
                $_SESSION['user'] = $user;
                return true;
            }        
        }
        return false;
    }
}