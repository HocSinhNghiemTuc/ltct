<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    protected $fillable = ['id','user_id','state','create_at'];
    protected $table = 'carts';
    public function 
}
