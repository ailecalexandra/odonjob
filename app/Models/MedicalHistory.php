<?php

namespace App\Models;

use App\Interfaces\MedicalHistory\MedicalHistoryInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends BaseModel implements MedicalHistoryInterface
{
    use HasFactory;
    protected $fillable = [
        self::DELETE_AT,
        self::DESCRIPTION,
        self::USER_ID,
    ];
}
