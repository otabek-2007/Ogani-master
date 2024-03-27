<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php foreach($products as $product):?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="/template/oganiMaster/img/categories/cat-1.jpg">
                                <h5><a href="/shopDetails/<?=$product['id']?>"><?= $product['name']?></a></h5>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>