<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{

    protected $fillable = ['id','payment_method_name','state','target_account'];
    public $timestamps = false;
    protected $table = 'payments';
}
