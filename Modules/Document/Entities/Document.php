<?php

namespace Modules\Document\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\Document\Entities\Document;

class Document extends Model
{
    protected $fillable = ['document','user_id'];

}
