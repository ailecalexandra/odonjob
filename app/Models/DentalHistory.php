<?php

namespace App\Models;

use App\Interfaces\DentalHistory\DentalHistoryInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentalHistory extends BaseModel implements DentalHistoryInterface
{
    protected $table='dental_histories';
    use HasFactory;
    protected $fillable = [
        self::DESCRIPTION,
        self::DELETE_AT,
        self::USER_ID
    ];
}
