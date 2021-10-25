<?php

namespace Modules\Acl\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;
use Modules\Acl\Entities\Permission;

class Role extends Model
{
    protected $fillable = ['name'];
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function users()
    {
         return $this->belongsToMany(User::class);
    }
    public function givePermissionTo(Permission $permission){
        $this->permissions()->save($permission);
    }
}
