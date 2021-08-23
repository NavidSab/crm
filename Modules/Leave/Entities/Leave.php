<?php

namespace Modules\Leave\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;
class Leave extends Model
{
    protected $guard_name = 'leave';
    protected $fillable = ['name','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    
}
