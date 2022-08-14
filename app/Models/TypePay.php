<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePay extends BaseModel
{
    protected $table = "type_payments";
    use HasFactory;
    protected $fillable = [
        'pay_id',
        'type_id'
    ];
}
