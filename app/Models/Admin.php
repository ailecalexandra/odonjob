<?php

namespace App\Models;

use App\Interfaces\Admin\AdminInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements AdminInterface, JWTSubject
{
    use HasFactory,HasRoles;
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function scopeSearch($query, $target){
        if ($target != '')
        {
            return $query
                ->where('admins.name','LIKE','%'.$target.'%')
                ->orWhere(function ($query) use ($target) {
                    return $query
                        ->where('admins.email','LIKE','%'.$target.'%');
                });

        }
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return[];
    }
}
