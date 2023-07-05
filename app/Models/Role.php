<?php

namespace App\Models;

use App\Models\User;
use App\Models\permission;
use App\Models\RoleHasPermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function permissions(){
        return $this->belongsToMany(permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }

    public function roleHasPermission(){
        return $this->hasMany(RoleHasPermission::class);
    }
}
