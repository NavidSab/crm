<?php
namespace Modules\FormBuilder\Entities;
use Modules\FormBuilder\Entities\FormItems;
use Illuminate\Database\Eloquent\Model;
class Form extends Model
{
    protected $fillable = ['id','name','action','method','slug'];
    public $timestamps=false;

    /**
     * The roles that belong to the Form
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function formItems(): BelongsToMany
    {
        return $this->hasMany(FormItems::class,'form_id','id');
    }
   

}
