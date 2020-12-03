<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $fillable = ['id','user_id','state','create_at'];
    protected $table = 'carts';
    public function totalBill(){
        $id = $this['id'];
        $sqlQuery = "SELECT sum(quantity*price) as value FROM carts c join cart_items i on (c.id = i.card_id) join products p on (p.id = i.product_id) where c.id = $id";
        $result = DB::select(DB::raw($sqlQuery));
        return $result[0]->value;
    }
    public function state(){
        $id = $this['id'];
        $sqlQuery = "SELECT state_name FROM orderstates a join carts b on (a.id = b.state) where b.id = $id";
        $result = DB::select(DB::raw($sqlQuery));
        return $result[0]->state_name;
    }
    public function paymentName(){
        $id = $this['id'];
        $sqlQuery = "SELECT payment_method_name FROM carts a join payments b on (a.payment_id = b.id) where a.id = $id";
        $result = DB::select(DB::raw($sqlQuery));
        if ($result == null)
            return 'Undefine';
        return $result[0]->payment_method_name;
    }
}
