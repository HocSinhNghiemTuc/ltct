@extends('customer.order.index')
@section('js')
    <script type="text/javascript" src="{{ asset('modules/order/js/checkout.js') }}"></script>
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-6 clearfix">
                        <div class="bill-to">
                            <p>Shipping Infomation</p>
                            <div class="shopper-info">
                                <form>
                                    <input type="text" placeholder="Name*">
                                    <input type="text" placeholder="Email*">
                                    <input type="text" placeholder="Phone*">
                                    <input type="text" placeholder="Province*">
                                    <input type="text" placeholder="District*">
                                    <input type="text" placeholder="Sub-District*">
                                    <input type="text" placeholder="Address*">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="order-message">
                            <p>Shipping Note</p>
                            <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery"
                                      rows="16"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Review</h2>
            </div>

            @include('order::cart.cart_items',$cart)
            <div class="row">

                    @include('order::payment.form_payment',$payments)
                <div class="col-md-6 col-md-offset-5">
                    <a class="btn btn-default check_out" href="{{route('cart.checkout')}}">Check Out</a>
                </div>
            </div>
        </div>
    </section>
@endsection
