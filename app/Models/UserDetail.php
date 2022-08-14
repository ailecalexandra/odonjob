<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'born-date',
        'location_id',
        'sector_id',
        'user_id',
        'referred_id',
        'detail_mother_id',
        'detail_father_id',
    ];
    public function Location(){
        return $this->hasOne(Location::class,'id','location_id');
    }
    public function Sector(){
        return $this->hasOne(Sector::class,'id','sector_id');
    }
    public function Referred(){
        return $this->hasOne(Referred::class,'id','referred_id');
    }
    public function DetailMother(){
        return $this->hasOne(DetailMother::class,'id','detail_mother_id');
    }
    public function DetailFather(){
        return $this->hasOne(DetailFather::class,'id','detail_father_id');
    }
}


