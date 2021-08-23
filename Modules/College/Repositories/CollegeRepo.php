<?php
namespace Modules\College\Repositories;
use Modules\College\Entities\College;
use Illuminate\Support\Facades\Hash;
use Auth;
class CollegeRepo
{
    public function count()
    {
        return College::count();
    }
    public function getWithPaginate()
    {
        return College::orderBy('id','DESC')->paginate(5);
    }
    public function getAll()
    {
        return College::orderBy('id','DESC')->get();
    }
    
    public function getMyItem()
    {
        return College::where('user_id',Auth::user()->id)->paginate(5);
    }
    public function store($request)
    {
            $fileName = time().'_'.$request->logo->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');
            $logo = '/storage/' . $filePath;
            return College::create([
                'name'              => $request->name,
                'user_id'           => Auth::user()->id,
                'logo'              => $logo,
                'location'          => $request->location,
                'api'               => $request->api,
                'api_description'   => $request->api_description,
            ]);
    }
    public function delete($id)
    {
        return College::find($id)->delete();
    }
    public function findById($id)
    {
        return College::find($id);
    }

    public function update($request)
    {
        if(!empty($request->logo))
        { 
            $fileName = time().'_'.$request->logo->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');
            $logo = '/storage/' . $filePath;
            $college =  College::find($request->college_id);
            $result = tap($college)->update([
                'name'              => $request->name,
                'user_id'           => Auth::user()->id,
                'logo'              => $logo,
                'location'          => $request->location,
                'api'               => $request->api,
                'api_description'   => $request->api_description,
            ]);
            return $result;
        }
        else{
            $college =  College::find($request->college_id);
            $result = tap($college)->update([
                'name'              => $request->name,
                'user_id'           => Auth::user()->id,
                'location'          => $request->location,
                'api'               => $request->api,
                'api_description'   => $request->api_description,
            ]);
            return $result;
        }

    }

}
