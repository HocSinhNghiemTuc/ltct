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
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span class="cart_total_all">${{$cart != null ? $cart->totalBill(): "0"}}</span></li>
                            <li>Eco Tax <span>Free</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span class="cart_total_all">${{$cart != null ? $cart->totalBill(): "0"}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        @if ($cart != null)
                            <a class="btn btn-default check_out"
                               href="{{route('cart.checkout')}}">Check Out</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
