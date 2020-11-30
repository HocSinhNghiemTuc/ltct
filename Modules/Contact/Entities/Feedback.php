<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    protected $fillable = ['id','email','content','is_solved','created_at'];
    protected $table = 'feedbacks';
}
