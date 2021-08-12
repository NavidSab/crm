<?php
namespace Modules\RolePermission\Repositories;
use Modules\RolePermission\Entities\Role;
use Modules\RolePermission\Entities\Permission;
use Illuminate\Support\Facades\Hash;
class PermissionRepo
{
    public function getRoles()
    {
        return Permission::select('name', 'id')->get();
    }
    public function getById($id){
        return Permission::find($id);
    }
    public function getAllPermission(){
        return Permission::get();
    }
    public function getOrderBy(){
        return Permission::orderBy('id','DESC')->paginate(5);
    }
    public function getWithJoin($id){
        return  Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    }
    public function store($request){
        return Permission::create([
            'name' => $request->input('name')
        ]);
    }
    public function delete($id)
    {
        return Permission::find($id)->delete();
    }
    public function update($request){
        $role =  Permission::find($request->permission_id);
        $result = tap($role)->update([
            'name'        =>$request->name
        ]);
        return $result;
    }
}
