<?php
namespace Modules\RolePermission\Repositories;
use Modules\RolePermission\Entities\Role;
use Modules\RolePermission\Entities\Permission;
use Illuminate\Support\Facades\Hash;
class RoleRepo
{
    public function getRoles()
    {
        return Role::select('name', 'id')->get();
    }
    public function getById($id){
        return Role::find($id);
    }
    public function getAllPermission(){
        return Permission::get();
    }
    public function getOrderBy(){
        return Role::orderBy('id','DESC')->paginate(5);
    }
    public function getWithJoin($id){
        return  Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    }
    public function store($request){
        return Role::create([
            'name' => $request->input('name')
        ]);
    }
    public function delete($id)
    {
        return Role::find($id)->delete();
    }
    public function update($request){
        $role =  Role::find($request->role_id);
        $result = tap($role)->update([
            'name'        =>$request->name
        ]);
        return $result;
    }
}
