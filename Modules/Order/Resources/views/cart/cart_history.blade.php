<tbody>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$order->id}}"
                       aria-expanded="true" aria-controls="collapseOne" style="color: {{$order->state() == "Huy don" ? "red" : "blue"}}">
                        Order at {{$order->updated_at}} - Total bill: {{$order->totalBill()}}$ - {{$order->state()}}
                    </a>
                </h4>
            </div>
            <div id="collapse_{{$order->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
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
                            @include('order::cart.cart_items',$cart = $order)
                        </table>
                    </div>
                    @if($order->state() != "Huy don")
                        <button class="btn btn-danger cancel-order" style="float: right"><a href="{{route("cart.cancel",['id'=>$order->id])}}" style="color: white" onclick="return confirm('Are you sure?')">Cancel</a></button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

