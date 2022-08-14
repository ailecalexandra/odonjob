<?php

namespace App\Models;

use App\Interfaces\Location\LocationInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends BaseModel implements LocationInterface
{
    use HasFactory;
    protected $fillable = [
        self::NAME
    ];
    public function UserDetails(){
        return $this->hasMany(UserDetail::class,'location_id','id');
    }
}
