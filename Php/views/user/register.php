<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/template/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="header">

                <div class="logo">
                    <img src="/template/oganiMaster/img/logo.png" alt="">
                </div>
                <div class="homePage">
                    <a href="index">Home<i class="fa-solid fa-house"></i></a>
                </div>
            
            </div>
            <form action="" method="post">
                <label for="name">Name</label>
                <input type="text"  name="name" id="name" class="firstName" value="<?=$name?>"  >
                <label for="email">Email</label>
                <input type="email" id="email" class="email" name="email" value="<?=$email?>" >
                <label for="password">Password</label>
                <input type="password" id="password" class="password" name="password" value="<?=$password?>" >
                <label for="confirmPass">Password Confirm</label>
                <input type="password" id="confirmPass" class="confirm_password" name="password_confirm">
                
                <input type="submit" name="submit" class="submit-btn" >
                <?php 
                    if (isset($errors) && is_array($errors)):
                        foreach ($errors as $value): 
                ?>
                    <span class="text-danger">* <?= $value ?></span>
                <?php 
                        endforeach; 
                    endif; 
                ?>
                <p class="to-register-way">
                    if you haven't been added or you forgot your password or email you can click button <a href="login">Login</a>
                </p>
            </form>

        </div>
    </div>
    <script src="/template/js/app.js"></script>
</body>
</html>