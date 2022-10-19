<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RolePermission extends Model
{
    use HasFactory;
    public $timestamps = false;

      public function permissionDetails(){
          return $this->hasOne(Permission::class,'id','permission_id');
      }

}
