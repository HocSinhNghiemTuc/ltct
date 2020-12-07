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
        <tbody>
        {{--                    {{dd($cart->products()[0])}}--}}
        @foreach($cart->products() as $cart_item)
            <tr>
                <td class="cart_product">
                    <a href="#">Image</a>
                </td>
                <td class="cart_description">
                    <h4><a href="">{{$cart_item->name}}</a></h4>
                    <p>Web ID: {{$cart_item->id}}</p>
                </td>
                <td class="cart_price">
                    <p class="cart_price_{{$cart_item->id}}">${{$cart_item->price}}</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        @if (Route::current()->getName() != 'cart.checkout')
                            <button class="cart_quantity_up" data-value="{{$cart_item->id}}"> + </button>
                        @endif
                        <input class="cart_quantity_input cart_quantity_input_{{$cart_item->id}}" type="text" name="quantity" disabled value="{{$cart_item->quantity}}"
                               autocomplete="off" size="2">
                        @if (Route::current()->getName() != 'cart.checkout')
                            <button class="cart_quantity_down" data-value="{{$cart_item->id}}"> - </button>
                        @endif
                    </div>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price cart_total_price_{{$cart_item->id}}">${{$cart_item->price*$cart_item->quantity}}</p>
                </td>
                @if (Route::current()->getName() != 'cart.checkout')
                    <td class="cart_delete">
                        <a class="cart_quantity_delete"
                           href="{{route("cart.delete_product",['id'=>$cart_item->id])}}"><i
                                class="fa fa-times"></i></a>
                    </td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
