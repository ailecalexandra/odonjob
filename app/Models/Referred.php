<?php

namespace App\Models;

use App\Interfaces\Referred\ReferredInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referred extends BaseModel implements ReferredInterface
{
    use HasFactory;
    protected $fillable = [
         self::NAME,
        self::NUMBER,
        self::EMAIL
    ];
    public function UserDetail(){
        return $this->hasOne(UserDetail::class,'referred_id','id');
    }

}
