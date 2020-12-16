<tbody>
@foreach($cart->products() as $cart_item)
    <tr>
        <td class="cart_product">
            <img style="width:150px; height:100px; object-fit: cover" src="{{asset($cart_item->feature_image_path)}}" alt="">
        </td>
        <td class="cart_description">
            <h4><p>{{$cart_item->name}}</p></h4>
            <p>Web ID: {{$cart_item->id}}</p>
        </td>
        <td class="cart_price">
            <p class="cart_price_{{$cart_item->id}}">${{$cart_item->price}}</p>
        </td>
        <td class="cart_quantity">
            <div class="cart_quantity_button">
                @if (Route::current()->getName() == 'cart.index')
                    <button class="cart_quantity_up" data-value="{{$cart_item->id}}"> +</button>
                @endif
                <input class="cart_quantity_input cart_quantity_input_{{$cart_item->id}}" type="text" name="quantity"
                       disabled value="{{$cart_item->quantity}}"
                       autocomplete="off" size="2">
                @if (Route::current()->getName() == 'cart.indext')
                    <button class="cart_quantity_down" data-value="{{$cart_item->id}}"> -</button>
                @endif
            </div>
        </td>
        <td class="cart_total">
            <p class="cart_total_price cart_total_price_{{$cart_item->id}}">
                ${{$cart_item->price*$cart_item->quantity}}</p>
        </td>
        @if (Route::current()->getName() == 'cart.index')
            <td class="cart_delete">
                <a class="cart_quantity_delete"
                   href="{{route("cart.delete_product",['id'=>$cart_item->id])}}"><i
                        class="fa fa-times"></i></a>
            </td>
        @endif

    </tr>
@endforeach
</tbody>

