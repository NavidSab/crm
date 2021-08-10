<?php
namespace Modules\RolePermission\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RolePermission\Repositories\RolePermissionRepo;
use Modules\RolePermission\Http\Requests\RoleRequest;
use DB;
class RolePermissionController extends Controller
{

    public $rolePermissionsRepo;
    public function __construct(RolePermissionRepo $rolePermissionsRepo)
    {
         $this->rolePermissionsRepo=$rolePermissionsRepo;
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => []]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $roles = $this->rolePermissionsRepo->getOrderBy();
        return view('rolepermission::index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $permission = $this->rolePermissionsRepo->getAllPermission();
        return view('rolepermission::create',compact('permission'));
    }
    public function store(RoleRequest $request)
    {
        $role =  $this->rolePermissionsRepo->store($request);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('rolepermission')->with('success','Role created successfully');
    }
    public function show($id)
    {
        $role =$this->rolePermissionsRepo->getById($id);
        $rolePermissions =$this->rolePermissionsRepo->getWithJoin($id); 
        return view('rolepermission::show',compact('role','rolePermissions'));
    }
    public function edit($id)
    {
        $role =$this->rolePermissionsRepo->getById($id);
        $permission =$this->rolePermissionsRepo->getAllPermission();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('rolepermission::edit',compact('role','permission','rolePermissions'));
    }
    public function update(RoleRequest $request)
    {
        $role = $this->rolePermissionsRepo->update($request);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('rolepermission')->with('success','Role updated successfully');
    }
    public function destroy($id)
    {
        $this->rolePermissionsRepo->delete($id); 
        return redirect()->route('rolepermission') ->with('success','Role deleted successfully');
    }
}
