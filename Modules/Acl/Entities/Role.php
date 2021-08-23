<?php

namespace Modules\Acl\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class , 'role_permissions');
    // }
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany('permission','role_permissions','role_id','permission_id');
    }
}
