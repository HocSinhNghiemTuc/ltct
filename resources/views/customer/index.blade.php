
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset("eshopper/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("eshopper/css/font-awesome.min.css")}}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <link href="{{asset("eshopper/css/prettyPhoto.css")}}" rel="stylesheet">
    <link href="{{asset("eshopper/css/price-range.css")}}" rel="stylesheet">
    <link href="{{asset("eshopper/css/animate.css")}}" rel="stylesheet">
    <link href="{{asset("eshopper/css/main.css")}}" rel="stylesheet">
    <link href="{{asset("eshopper/css/responsive.css")}}" rel="stylesheet">
    @yield('css')
<!--[if lt IE 9]>
    <script src="{{asset("eshopper/js/html5shiv.js")}}"></script>
    <script src="{{asset("eshopper/js/respond.min.js")}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset("eshopper/images/ico/favicon.ico")}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{asset("eshopper/images/ico/apple-touch-icon-144-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset("eshopper/images/ico/apple-touch-icon-114-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset("eshopper/images/ico/apple-touch-icon-72-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed"
          href="{{asset("eshopper/images/ico/apple-touch-icon-57-precomposed.png")}}">
</head><!--/head-->

<body>
<meta name="csrf-token" content="{{ csrf_token() }}">
<header id="header"><!--header-->

    <!-- Start Header Top -->
@include('customer.header.header_top')
<!-- End Header Top -->

    @include('customer.header.header_middle')

    @include('customer.header.header-bottom')
</header><!--/header-->

{{--Slider--}}
@include('customer.slider.slider')

<section>
    <div class="container">
        <div class="row">
            

            <div class="col-sm-12 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    
                    @foreach ($products as $product)
                        @include('partials.product', $product)
                    @endforeach
                </div><!--features_items-->

            </div>
        </div>
    </div>
</section>

<!--/Footer-->

@include("customer.footer.footer")

<script src="{{asset("eshopper/js/jquery.js")}}"></script>
<script src="{{asset("eshopper/js/bootstrap.min.js")}}"></script>
<script src="{{asset("eshopper/js/jquery.scrollUp.min.js")}}"></script>
<script src="{{asset("eshopper/js/price-range.js")}}"></script>
<script src="{{asset("eshopper/js/jquery.prettyPhoto.js")}}"></script>
<script src="{{asset("eshopper/js/main.js")}}"></script>

<script src="{{asset("modules/contact/js/form_feedback.js")}}"></script>
@yield('js')
<script type="text/javascript" src="{{ asset('modules/order/js/cart.js') }}"></script>
</body>
</html>
