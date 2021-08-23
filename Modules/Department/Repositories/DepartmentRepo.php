<?php
namespace Modules\Department\Repositories;
use Modules\Department\Entities\Department;
use Illuminate\Support\Facades\Hash;

class DepartmentRepo
{

    public function getWithPaginate()
    {
        return Department::orderBy('id','DESC')->paginate(5);
    }
    public function getAll()
    {
        return Department::orderBy('id','DESC')->get();
    }
    public function findById($id)
    {
        return Department::find($id);
    }
    public function delete($id)
    {
        return Department::find($id)->delete();
    }
    public function store($request)
    {
        return Department::create([
            'name'     => $request->name,
            'head_id'    => $request->head_id
        ]);
    }
    public function update($request)
    {
        return Department::where('id',$request->department_id)->update([
            'name'  =>$request->name,
            'head_id'        =>$request->head_id,
        ]);
        
    }
}
