<?php
namespace Modules\RolePermission\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RolePermission\Repositories\PermissionRepo;
use Modules\RolePermission\Http\Requests\PermissionRequest;
use DB;
class PermissionController extends Controller
{

    public $permissionsRepo;
    public function __construct(PermissionRepo $permissionsRepo)
    {
         $this->permissionsRepo=$permissionsRepo;
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => []]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $permissions = $this->permissionsRepo->getOrderBy();
        return view('rolepermission::permission.index',compact('permissions'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $permission = $this->permissionsRepo->getAllPermission();
        return view('rolepermission::permission.create',compact('permission'));
    }
    public function store(PermissionRequest $request)
    {
        $role =  $this->permissionsRepo->store($request);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('permission')->with('success','Role created successfully');
    }
    public function show($id)
    {
        $role =$this->permissionsRepo->getById($id);
        $rolePermissions =$this->permissionsRepo->getWithJoin($id); 
        return view('rolepermission::permission.show',compact('role','rolePermissions'));
    }
    public function edit($id)
    {
        $permission =$this->permissionsRepo->getById($id);
        return view('rolepermission::permission.edit',compact('permission'));
    }
    public function update(PermissionRequest $request)
    {
        $role = $this->permissionsRepo->update($request);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('permission')->with('success','Permission updated successfully');
    }
    public function destroy($id)
    {
        $this->permissionsRepo->delete($id); 
        return redirect()->route('permission') ->with('success','Permission deleted successfully');
    }
}
