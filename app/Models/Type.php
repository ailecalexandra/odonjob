<?php

namespace App\Models;

use App\Interfaces\Type\TypeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends BaseModel implements TypeInterface
{
    use HasFactory;
    protected $table = self::TABLE_NAME;
    protected $fillable = [
        self::NAME
    ];
}
