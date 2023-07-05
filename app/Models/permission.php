<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class permission extends Model
{
    use HasFactory;

    public function role(){
        return $this->belongsToMany (Role::class);
    }

    public function roleHasPermission(){
        return $this->hasMany(RoleHasPermission::class);
    }
}
