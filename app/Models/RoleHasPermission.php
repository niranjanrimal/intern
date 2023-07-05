<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;

    public function roleandpermission()
{
    return $this->belongsToMany(Role::class, Permission::class, 'role_id', 'permission_id');
}
}
