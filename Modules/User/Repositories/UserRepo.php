<?php
namespace Modules\User\Repositories;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Hash;
class UserRepo
{

    public function getAll()
    {
        return User::orderBy('id','DESC')->paginate(5);
    }
    public function find($id)
    {
        return User::find($id);
    }
    public function delete($id)
    {
        return User::find($id)->delete();
    }
    public function store($request)
    {
        return User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
