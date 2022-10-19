<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Permission extends Model
{
    use HasFactory;
    public $timestamps = false;
    public static function PermissionChecker($permission){
        $permissions  =  RolePermission::where('role_id',Auth::user()->role_id)->get();
       $access=false;
       foreach ($permissions as $permissionItem){
            if(Permission::where('id',$permissionItem->permission_id)->value('route_name')==$permission){
                $access=true;
            }
       }
       return $access;

    }
}
