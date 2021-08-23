<?php

namespace Modules\Program\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\Program\Entities\Program;

class Program extends Model
{
    protected $fillable = ['name','location','logo','api','api_description','user_id'];

}
