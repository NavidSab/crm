<?php
namespace Modules\Program\Repositories;
use Modules\Program\Entities\Program;
use Auth;
class ProgramRepo
{
    public function count()
    {
        return Program::count();
    }
    public function getAll()
    {
        return Program::orderBy('id','DESC')->paginate(5);
    }
    public function getMyItem()
    {
        return Program::where('user_id',Auth::user()->id)->paginate(5);
    }
    public function store($request)
    {
            $fileName = time().'_'.$request->logo->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');
            $logo = '/storage/' . $filePath;
            return Program::create([
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
        return Program::find($id)->delete();
    }
    public function findById($id)
    {
        return Program::find($id);
    }

    public function update($request)
    {
        if(!empty($request->logo))
        { 
            $fileName = time().'_'.$request->logo->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');
            $logo = '/storage/' . $filePath;
            $college =  Program::find($request->college_id);
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
            $college =  Program::find($request->college_id);
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
