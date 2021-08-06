<?php

namespace Modules\User\Entities;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    // use HasFactory;

    protected $fillable = ['name','email','password'];
    
    protected static function newFactory()
    {
        return \Modules\User\Database\factories\UserFactory::new();
    }
}
