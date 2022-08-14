<?php

namespace App\Models;

use App\Interfaces\Sector\SectorInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends BaseModel implements SectorInterface
{
    use HasFactory;
    protected $fillable = [
        self::NAME
    ];
    public function UserDetails(){
        return $this->hasMany(UserDetail::class,'sector_id','id');
    }
}
