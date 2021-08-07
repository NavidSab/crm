<?php

namespace Modules\User\Entities;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\RolePermission\Http\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // use HasFactory, Notifiable, HasRoles;
    use  Notifiable, HasRoles;

    protected $fillable = ['name','email','password'];
    
    protected static function newFactory()
    {
        return \Modules\User\Database\factories\UserFactory::new();
    }
}
