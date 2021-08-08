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
    public function storeUser($request)
    {
        return User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
