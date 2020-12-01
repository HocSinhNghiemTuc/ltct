<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    protected $fillable = ['id','contact_name','contact_value','icon','color','status','show?'];
    public $timestamps = false;
    protected $table = 'contacts';
}
