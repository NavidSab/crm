<?php
namespace Modules\FormBuilder\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\FormBuilder\Entities\Form;
class FormItems extends Model
{
    protected $fillable = ['name', 'type','form_id','placeholder'];
    public $timestamps=false;

     /**
     * The roles that belong to the Form
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function forms(): BelongsToMany
    {
        return $this->belongsTo(Form::class,'form_id','id');
    }
   

}
