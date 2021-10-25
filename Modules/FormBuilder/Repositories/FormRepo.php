<?php
namespace Modules\FormBuilder\Repositories;
use Modules\FormBuilder\Entities\Form;
use Modules\FormBuilder\Entities\FormItems;
use Illuminate\Support\Facades\Hash;
class FormRepo
{

    public function getAll()
    {
        return Form::orderBy('id','DESC')->get();
    }


    public function getWithPaginate()
    {
        return Form::orderBy('id','DESC')->paginate(5);
    }

    public function getItem($id){
        return FormItems::where('form_id',$id)->orderBy('id','DESC')->paginate(5);
    }

    public function store($request)
    {
        return Form::create($request->all());
    }


    public function storeItem($request)
    {
        return FormItems::create([
            'form_id'       => $request->form_id,
            'placeholder'   => $request->placeholder,
            'type'          => $request->type,
            'name'          => $request->name

        ]);
    }



    
    
    public function deleteItem($id)
    {
        return FormItems::find($id)->delete();
    }
    public function delete($id)
    {
        return Form::find($id)->delete();
    }
}
