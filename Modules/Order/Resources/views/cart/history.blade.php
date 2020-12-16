@extends('customer.order.index')
@section('js')
    <script type="text/javascript" src="{{ asset('modules/order/js/cart.js') }}"></script>
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route("homepage")}}">Home</a></li>
                    <li class="active"><a href="{{route("cart.index")}}">Shopping Cart</a></li>
                    <li class="active"><a href="{{route("cart.history")}}">History Order</a></li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                @if ($orders != null)
                    @include('order::cart.cart_history',$orders)
                @endif
            </div>
        </div>
    </section>
@endsection
