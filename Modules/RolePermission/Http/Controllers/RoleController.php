<?php
namespace Modules\RolePermission\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RolePermission\Repositories\RoleRepo;
use Modules\RolePermission\Http\Requests\RoleRequest;
use DB;
class RoleController extends Controller
{

    public $roleRepo;
    public function __construct(RoleRepo $roleRepo)
    {
         $this->roleRepo=$roleRepo;
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => []]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $roles = $this->roleRepo->getOrderBy();
        return view('rolepermission::role.index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $permission = $this->roleRepo->getAllPermission();
        return view('rolepermission::role.create',compact('permission'));
    }
    public function store(RoleRequest $request)
    {
        $role =  $this->roleRepo->store($request);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('role')->with('success','Role created successfully');
    }
    public function show($id)
    {
        $role =$this->roleRepo->getById($id);
        $rolePermissions =$this->roleRepo->getWithJoin($id); 
        return view('rolepermission::role.show',compact('role','rolePermissions'));
    }
    public function edit($id)
    {
        $role =$this->roleRepo->getById($id);
        $permission =$this->roleRepo->getAllPermission();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('rolepermission::role.edit',compact('role','permission','rolePermissions'));
    }
    public function update(RoleRequest $request)
    {
        $role = $this->roleRepo->update($request);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('role')->with('success','Role updated successfully');
    }
    public function destroy($id)
    {
        $this->roleRepo->delete($id); 
        return redirect()->route('role') ->with('success','Role deleted successfully');
    }
}
