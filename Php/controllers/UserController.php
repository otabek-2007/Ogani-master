<?php

class UserController{
    public static function actionRegister(){
        
        $name = '';
        $email = '';
        $password = '';
        if(isset($_POST["submit"])){
            $name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $passwordConfirm = $_POST['password_confirm'] ?? null;
            $errors = [];           

            if (!User::checkName($name)) $errors['name'] = 'The name characters must be 4 or more than';

            if (!User::checkPassword($password, $passwordConfirm)) {
                $errors['password'] = 'The password characters must be 6 or more than and password confirms characters must ' . '<br>' . '* be equal to password ';
            }
            if (User::checkEmailExists($email)) {
                $errors['email'] = 'this email already connected';
            }  
            if (count($errors) == 0) {
                $result = User::register($name, $email, $password);
                // User::userInsertPocket();
                header('Location: index');
                
                return $result;
            }   
        }
        return require_once ROOT . '/views/user/register.php';
    }   
    public static function actionLogin(){

        
        if(isset($_POST['submit'])){
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $errors = [];
            if (!User::Login($email, $password)) {
                $errors['email'] = 'this email unexists or the password is false';
            }
            
            if (count($errors) == 0){
                // User::userInsertPocket();
                header('Location: index');        
                return true;

            }      
        }
        return require_once ROOT . '/views/user/login.php';
    }
    
    public static function actionError(){
        return require_once ROOT . '/views/user/error.php';
    }


}
