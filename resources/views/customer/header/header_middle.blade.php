<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-md-4 clearfix">
                <div class="logo pull-left">
                    <a href="{{route('homepage')}}"><img src="{{asset("eshopper/images/home/logo.png")}}" alt=""/></a>
                </div>
                <div class="btn-group pull-right clearfix">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            USA
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="">Canada</a></li>
                            <li><a href="">UK</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            DOLLAR
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="">Canadian Dollar</a></li>
                            <li><a href="">Pound</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 clearfix">
                <div class="shop-menu clearfix pull-right">
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                        <li><a href="{{ route('editAcc', ['id' => Auth::user()->id]) }}"><i class="fa fa-user"></i>Edit Account</a></li>
                        @endif
                        <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                        <li><a href="{{asset("eshopper/checkout.html")}}"><i class="fa fa-crosshairs"></i> Checkout</a>
                        </li>
                        <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                        @if (Auth::check())
                            <li><a href="/logout"><i class="fa fa-lock"></i> Logout</a></li>
                            <li><a href="/admin"><i class=""></i> For Admin</a></li>
                        @else
                            <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                            <li><a href="/signup"><i></i> SignUp</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-middle-->
