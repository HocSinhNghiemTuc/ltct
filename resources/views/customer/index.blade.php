<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("thewayshop/images/favicon.ico")}}" >
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset("thewayshop/images/apple-touch-icon.png")}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset("thewayshop/css/style.css")}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset("thewayshop/css/responsive.css")}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset("thewayshop/css/custom.css")}}">


</head>

<body>

<!-- Start Main Top -->
@include('partials.maintop')
<!-- End Main Top -->

<!-- Start Main Top -->
@include('partials.header_cus')
<!-- End Main Top -->

<!-- Start Top Search -->
@include('partials.search')
<!-- End Top Search -->

<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-left">
            <img src="{{asset("thewayshop/images/banner-01.jpg")}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to
                            see any changes in performance over time.</p>
                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{asset("thewayshop/images/banner-02.jpg")}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to
                            see any changes in performance over time.</p>
                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-right">
            <img src="{{asset("thewayshop/images/banner-03.jpg")}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to
                            see any changes in performance over time.</p>
                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
<div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{asset("thewayshop/images/t-shirts-img.jpg")}}" alt=""/>
                    <a class="btn hvr-hover" href="#">T-shirts</a>
                </div>
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{asset("thewayshop/images/shirt-img.jpg")}}" alt=""/>
                    <a class="btn hvr-hover" href="#">Shirt</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{asset("thewayshop/images/wallet-img.jpg")}}" alt=""/>
                    <a class="btn hvr-hover" href="#">Wallet</a>
                </div>
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{asset("thewayshop/images/women-bag-img.jpg")}}" alt=""/>
                    <a class="btn hvr-hover" href="#">Bags</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{asset("thewayshop/images/shoes-img.jpg")}}" alt=""/>
                    <a class="btn hvr-hover" href="#">Shoes</a>
                </div>
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{asset("thewayshop/images/women-shoes-img.jpg")}}" alt=""/>
                    <a class="btn hvr-hover" href="#">Women Shoes</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Categories -->

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".top-featured">Top featured</button>
                        <button data-filter=".best-seller">Best seller</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="{{asset("thewayshop/images/img-pro-01.jpg")}}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                            class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i
                                            class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i
                                            class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h5> $7.79</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="new">New</p>
                        </div>
                        <img src="{{asset("thewayshop/images/img-pro-02.jpg")}}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                            class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i
                                            class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i
                                            class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h5> $9.79</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="{{asset("thewayshop/images/img-pro-03.jpg")}}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                            class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i
                                            class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i
                                            class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h5> $10.79</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="{{asset("thewayshop/images/img-pro-04.jpg")}}" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                            class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i
                                            class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i
                                            class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h5> $15.79</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Products  -->

<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-01.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-02.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-03.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-04.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-05.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-06.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-07.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-08.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-09.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset("thewayshop/images/instagram-img-05.jpg")}}" alt=""/>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Instagram Feed  -->


<!-- Start Footer  -->
@include('partials.footer_cus',$contacts)
<!-- End Footer  -->

<!-- Start copyright  -->
<div class="footer-copyright">
    <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
        <a href="https://facebook.com">html design</a></p>
</div>
<!-- End copyright  -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!-- ALL PLUGINS -->
<script src="{{asset("thewayshop/js/jquery.superslides.min.js")}}"></script>
<script src="{{asset("thewayshop/js/bootstrap-select.js")}}"></script>
<script src="{{asset("thewayshop/js/inewsticker.js")}}"></script>
<script src="{{asset("thewayshop/js/bootsnav.js.")}}"></script>
<script src="{{asset("thewayshop/js/images-loded.min.js")}}"></script>
<script src="{{asset("thewayshop/js/isotope.min.js")}}"></script>
<script src="{{asset("thewayshop/js/owl.carousel.min.js")}}"></script>
<script src="{{asset("thewayshop/js/baguetteBox.min.js")}}"></script>
<script src="{{asset("thewayshop/js/form-validator.min.js")}}"></script>
<script src="{{asset("thewayshop/js/contact-form-script.js")}}"></script>
<script src="{{asset("thewayshop/js/custom.js")}}"></script>
<script src="{{asset("modules/contact/js/form_feedback.js")}}"></script>
</body>

</html>
