<!DOCTYPE html>
<html lang="zxx">


    <?php require_once ROOT . '/views/loyout/header.php';?>

    <!-- Page Preloder -->
    <!-- Humberger Begin -->
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/template/oganiMaster/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="/index">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    <!-- Shoping Cart Section Begin -->
    <form action="" method="post">
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach($pocket_items as $item): ?>
                                            <tr>
                                                <td class="shoping__cart__item">
                                                    <img src="/template/oganiMaster/img/cart/cart-1.jpg" alt="">
                                                    <h5><?=$item['name']?> Package</h5>
                                                </td>
                                                <td class="shoping__cart__price">
                                                    $<?= $item['price'];?>        
                                                </td>
                                                <td class="shoping__cart__quantity">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input class="counter" name="counterPocket" type="text" value="<?= $counterPocket;?>">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="shoping__cart__total">
                                                    $<?php if (isset($submitBtn)) {
                                                        echo $item['price'] * $counterPocket;
                                                         
                                                    }?>
                                                </td>
                                                <td class="shoping__cart__item__close">
                                                    <span data-id = "<?= $item['id'] ?>" class="icon_close"></span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>    
                                </tbody>
                            </table>
                            <input type="submit" name="submitCart" value="ADD-TO-CAR" class="primary-btn" id="submit" style="border:0px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- Footer Section Begin -->
    <?php require_once ROOT . '/views/loyout/footer.php';?>


</html>