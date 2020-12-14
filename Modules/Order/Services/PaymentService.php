<?php
namespace Modules\Order\Services;

use Modules\Order\Entities\Payment;

class PaymentService{
    public function index(){
        return Payment::all();
    }
}
