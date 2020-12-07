<div class="review-payment">
    <h2>Payment method</h2>
</div>
<br><br>
<div class="payment-options " style="margin-bottom: 2rem">
    @foreach($payments as $payment)
        <span>
            <label>
                <input type="radio" class="payment_method_end" name="payment_id" value="{{$payment->id}}" checked> {{$payment->payment_method_name}}
            </label>
        </span>
    @endforeach
</div>
