@extends('customer.order.index')
@section('js')
    <script type="text/javascript" src="{{ asset('modules/order/js/checkout.js') }}"></script>
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        @if (Route::current()->getName() != 'cart.checkout')
                            <td></td>
                        @endif
                    </tr>
                    </thead>
                    @if ($cart != null)
                        @include('order::cart.cart_items',$cart)
                    @endif
                </table>
            </div>
            <div class="row">
                @include('order::payment.form_payment',$payments)
                <div class="col-md-6 col-md-offset-5">
                    <button class="btn btn-primary end_checkout">Check Out</button>
                </div>
            </div>
        </div>
    </section>
@endsection
