<div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
        <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="description"></td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        {{--                    {{dd($cart->products()[0])}}--}}
        @foreach($cart->products() as $cart_item)
            <tr>
                <td class="cart_product">
                    <a href=""><img src="images/cart/one.png" alt=""></a>
                </td>
                <td class="cart_description">
                    <h4><a href="">{{$cart_item->name}}</a></h4>
                    <p>Web ID: {{$cart_item->id}}</p>
                </td>
                <td class="cart_price">
                    <p>${{$cart_item->price}}</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <a class="cart_quantity_up" href=""> + </a>
                        <input class="cart_quantity_input" type="text" name="quantity" value="1"
                               autocomplete="off" size="2">
                        <a class="cart_quantity_down" href=""> - </a>
                    </div>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">${{$cart_item->price*$cart_item->quantity}}</p>
                </td>
                <td class="cart_delete">
                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>