<?php

namespace Modules\College\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\College\Entities\College;

class College extends Model
{
    protected $fillable = ['name','location','logo','api','api_description','user_id'];

}
