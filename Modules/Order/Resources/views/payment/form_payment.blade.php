<div class="review-payment">
    <h2>Payment method</h2>
</div>
<br><br>
<div class="col-md-6 col-md-offset-3">
<div class="payment-options " style="margin-bottom: 2rem">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        @foreach($payments as $payment)
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapse_{{$payment['id']}}" aria-expanded="true"
                           aria-controls="collapseOne">
                            {{$payment['payment_method_name']}}
                        </a>
                    </h4>
                </div>
                <div id="collapse_{{$payment['id']}}" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="headingOne">
                    <div class="panel-body">
                        Thong tin
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
