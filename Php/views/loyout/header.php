<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/template/oganiMaster/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/template/oganiMaster/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/template/oganiMaster/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/template/oganiMaster/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/template/oganiMaster/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/template/oganiMaster/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/template/oganiMaster/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/template/oganiMaster/css/style.css" type="text/css">
    <link rel="stylesheet" href="/template/css/activeClasses.css" type="text/css">
    <link rel="stylesheet" href="/template/css/active.css" type="">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="/template/oganiMaster/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="/userPocket"><i class="fa fa-shopping-bag"></i><span class="cart-count"><?=$count_items['count']?></span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="/template/oganiMaster/img/language.png" alt="">
                <div>English</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="#">Spanis</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </div>
            <?php if(!isset($_SESSION['user'])) :?>
                                
            <div class="header__top__right__language" >
                    <div>Open Site</div>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="/register">Register</a></li>
                            <li><a href="/login">Login</a></li>
                        </ul>
                    </div>
                    
                    <?php  endif;?>
                    
                    <?php if($_SESSION['user'] ?? false): ?>
                        <div class="header__top__right__language user-data">
                            <div> 
                                <i class="fa fa-user">User</i>
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <ul class="ul">
                                <li>Name: <span><?= $_SESSION['user']['name'] ?? null; ?></span></li>
                                <li>Email: <span><?= $_SESSION['user']['email'] ?? null; ?></span></li>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <?php if($_SESSION['user'] ?? false): ?>
                            <div class="header__top__right__language user-logout">
                                <form action="" method="post">
                                    <button name="submit" class="logout-btn">Logout<i class="fa fa-sign-out"></i></button> 
                                    <?php if(isset($_POST['submit'])){
                            unset($_SESSION['user']);
                            
                        }
                        ?>                                         
                </form>
            </div>
            <?php endif; ?>
            
        </div>  
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="/index">Home</a></li>
                <li><a href="/shopGrid">Shop</a></li>
                <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <!-- <li><a href="/shopDetails">Shop Details</a></li> -->
                    <li><a href="/shopCart">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <header class="header">
        <div class="header__top">
            <div class="container-fluid">
                <div class="row col-12">
                    <div class="col-lg-5">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="header__top__right col-12 container-user">
                            <div class="humberger__menu__widget">
                                <div class="header__top__right__social col-3">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                                <div class="header__top__right__language">
                                    <img src="/template/oganiMaster/img/language.png" alt="">
                                <div>English</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="#">Spanis</a></li>
                                        <li><a href="#">English</a></li>
                                    </ul>
                                </div>
                            <?php if(!isset($_SESSION['user'])) :?>
                                
                            <div class="header__top__right__language">
                                <div>Open Site</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="/register">Register</a></li>
                                        <li><a href="/login">Login</a></li>
                                    </ul>
                                </div>
                                
                                <?php  endif;?>
                                            
                            <?php if($_SESSION['user'] ?? false): ?>
                                <div class="header__top__right__language user-data">
                                    <div> 
                                        <i class="fa fa-user">User</i>
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <ul class="ul">
                                        <li>Name: <span><?= $_SESSION['user']['name'] ?? null; ?></span></li>
                                        <li>Email: <span><?= $_SESSION['user']['email'] ?? null; ?></span></li>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php if($_SESSION['user'] ?? false): ?>
                                    <div class="header__top__right__language user-logout">
                                        <form action="" method="post">
                                            <button name="submit" class="logout-btn">Logout<i class="fa fa-sign-out"></i></button> 
                                            <?php if(isset($_POST['submit'])){
                                                unset($_SESSION['user']);
                                                // return true;
                                            }                                     
                                            ?>                                         
                                    </form>
                                </div>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index"><img src="/template/oganiMaster/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/index">Home</a></li>
                            <li><a href="/shopGrid">Shop</a></li>
                            <li><a href="#">Pages</a>
                           
                            <ul class="header__menu__dropdown">
                                    <!-- <li><a href="/shopDetails">Shop Details</a></li> -->
                                    <li><a href="/shopCart">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="/userPocket"><i class="fa fa-shopping-bag"></i><span class="cart-count"><?=$count_items['count']?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    
</body>
</html>