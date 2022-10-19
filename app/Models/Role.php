<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    use HasFactory;

    public function permissions(){
        return $this->hasMany(RolePermission::class);
    }

    public static function permissionsList(){
        $permissionsAll  =  RolePermission::where('role_id',Auth::user()->role_id)->get();
        $permissions = array();
        foreach ($permissionsAll as $permissionItem){
            array_push($permissions, Permission::where('id',$permissionItem->permission_id)->value('route_name'));
        }
        return $permissions;
    }
}
