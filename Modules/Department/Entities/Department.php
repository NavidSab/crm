<?php

namespace Modules\Department\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;
class Department extends Model
{
    protected $guard_name = 'departments';
    protected $fillable = ['name','head_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'head_id', 'id');
    }

    
}
