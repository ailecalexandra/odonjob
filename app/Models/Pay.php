<?php

namespace App\Models;

use App\Interfaces\Payment\PaymentInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends BaseModel implements PaymentInterface
{
    protected $table = "payments";
    use HasFactory;
    protected $fillable = [
        'amount',
        'user_id',
        PaymentInterface::DESCRIPTION,
        PaymentInterface::DENTAL_HISTORY_ID
    ];
    public function Types(){
        return $this->belongsToMany(Type::class,'type_payments');
    }
}
