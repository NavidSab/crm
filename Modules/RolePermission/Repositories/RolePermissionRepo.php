<?php
namespace Modules\RolePermission\Repositories;
use Modules\RolePermission\Entities\Role;
use Illuminate\Support\Facades\Hash;
class RolePermissionRepo
{

    public function getRoles()
    {
        return Role::select('name', 'id')->get();
    }
    public function storeUser($request)
    {
        return Role::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
