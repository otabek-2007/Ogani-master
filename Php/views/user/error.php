<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .content{
        border:5px solid green;
    }
    .error-text {
        padding: 8px;
        font-size:20px;
        display:flex;
        justify-content:center;
        flex-direction:column;
        color: black;
        font-family: sans-serif;
        /* margin-bottom:30px; */
    }
    
    .error-text a:hover{
        color:blue;
    }
    .error-text .error{
        color: red;
    }
    
</style>
    
<body>
    <?php require_once ROOT . '/views/loyout/header.php';?>

    <div class="container">
        <div class="content">
            <div class="error-text">
                <p class="error">Sorry you do not buy products becouse</p>
                <p>If you have not registered yet . So you must be <a href="/register" >Register</a> </p> </br>
                <p>If you have registered. So you can login<a href="/login"> Login</a></p>
            </div>
        </div>
    </div>

    <?php require_once ROOT . '/views/loyout/footer.php';?>
</body>
</html>