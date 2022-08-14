<?php

namespace App\Models;

use App\Interfaces\DetailParent\DetailParentInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMother extends BaseModel implements DetailParentInterface
{
    use HasFactory;
    protected $fillable = self::FILLABLE;
    public function UserDetail(){
        return $this->hasOne(UserDetail::class,'detail_mother_id','id');
    }
    public function Occupation(){
        return $this->hasOne(Occupation::class, 'id','occupation_id');
    }
}
