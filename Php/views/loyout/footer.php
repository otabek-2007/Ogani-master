<footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="/index"><img src="/template/oganiMaster/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
</footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    
    <script src="/template/js/app.js"></script> 
    <script src="/template/oganiMaster/js/jquery-3.3.1.min.js"></script>
    <script src="/template/oganiMaster/js/bootstrap.min.js"></script>
    <script src="/template/oganiMaster/js/jquery.nice-select.min.js"></script>
    <script src="/template/oganiMaster/js/jquery-ui.min.js"></script>
    <script src="/template/oganiMaster/js/jquery.slicknav.js"></script>
    <script src="/template/oganiMaster/js/mixitup.min.js"></script>
    <script src="/template/oganiMaster/js/owl.carousel.min.js"></script>
    <script src="/template/oganiMaster/js/main.js"></script>
    <script>

        var counters = document.querySelectorAll('.cart-count');
        var addBtns = document.querySelectorAll('.add-cart');
        var activeBtns = document.querySelectorAll('.add-cart-active')
        var activeBtnsIn = document.querySelectorAll('.fa-shopping-cart')
        for(btn of addBtns){
            
            btn.addEventListener('click', function(event){
                for(counter of counters){
                    counter.textContent++
                }
            })
        }
        for(btnAct of activeBtns){
            btnAct.addEventListener('click', function(event){
                if(event.currentTarget.classList.contains('active_for_btn_korzinka')){
                    event.currentTarget.classList.remove('active_for_btn_korzinka')
                    // event.target.classList.remove('active_for_btn_korzinka_in')
                    
                }else{
                    // event.target.classList.add('active_for_btn_korzinka_in')

                    event.currentTarget.classList.add('active_for_btn_korzinka')
                }
                // debugger
            })
        }
        for(activIn of activeBtnsIn){
            activIn.addEventListener('click', function(event){
                event.classList.add('active_for_btn_korzinka_in')

            })
        }
        
       

        $(document).ready(function() {
            $('.add-cart').click(function () {
             
                if($('.add-cart-active').hasClass('active_for_btn_korzinka')){
                    const params = {};
                    params.products = [
                        { 
                            id: $(this).attr('data-id'),
                            quantity: 1
                        }
                    ]
                    params.typeAdd = 'add';
                    $.post('/pocket', {products:params.products, typeAdd: params.typeAdd}, function(data){
                        // debugger
                    })
                }
                else{
                    // $('.add-cart-active').removeClass('active_for_btn_korzinka')   

                    const params = {};
                    params.products = [
                        { 
                            id: $(this).attr('data-id'),
                            quantity: 1
                        }
                    ]
                   
                    params.typeDel = 'delete';
                    $.post('/pocket', {products:params.products, typeDel: params.typeDel}, function(data){
                        // debugger
                    })
                }
                return false;
            })
        })
        $(document).ready(function() {
            
            $('.icon_close').click(function(){
                const params = {};
                    params.products = [
                        { 
                            id: $(this).attr('data-id'),
                            quantity: 1
                        }
                    ]
                   
                    params.typeDel = 'delete';
                    $.post('/pocket', {products:params.products, typeDel: params.typeDel}, function(data){
                        // debugger
                    }) 
            })

        })

</script>
