<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{


    protected $fillable = ['cart_id','product_id','quantity'];
    protected $table = 'cart_items';


}
