<?php
namespace Modules\Leave\Repositories;
use Modules\Leave\Entities\Leave;

class LeaveRepo
{

    public function getAll()
    {
        return Leave::orderBy('id','DESC')->paginate(5);
    }
    public function findById($id)
    {
        return Leave::find($id);
    }
    public function delete($id)
    {
        return Leave::find($id)->delete();
    }
    public function store($request)
    {
        return Leave::create([
            'name'     => $request->name,
            'head_id'    => $request->head_id
        ]);
    }
    public function update($request)
    {
        return Leave::where('id',$request->leave_id)->update([
            'name'  =>$request->name,
            'head_id'        =>$request->head_id,
        ]);
        
    }
}
