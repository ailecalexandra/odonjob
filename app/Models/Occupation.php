<?php

namespace App\Models;

use App\Interfaces\Occupation\OccupationInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends BaseModel implements OccupationInterface
{
    use HasFactory;
    protected $fillable = [
        self::NAME
    ];

}
