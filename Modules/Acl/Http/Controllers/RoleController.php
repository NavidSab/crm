<?php
namespace Modules\Acl\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Acl\Repositories\RoleRepo;
use Modules\Acl\Http\Requests\RoleRequest;
use DB;
class RoleController extends Controller
{

    public $roleRepo;
    public $title;
    public $description;
    public function __construct(RoleRepo $roleRepo)
    {
        $this->title='Role';
        $this->description='description';
        $this->roleRepo=$roleRepo;
    }
    public function index(Request $request)
    {
        $title='Role List';
        $description= $this->description;
        $roles = $this->roleRepo->getOrderBy();
        return view('acl::role.index',compact('title','description','roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $title='Role Create';
        $description= $this->description;
        $permission = $this->roleRepo->getAllPermission();
        return view('acl::role.create',compact('title','description','permission'));
    }
    public function store(RoleRequest $request)
    {
        $role_id =  $this->roleRepo->store($request);
        $role_id =  $this->roleRepo->store($request);

        return redirect()->route('role')->with('success','Role created successfully');
    }
    public function show($id)
    {
        $title='Role Details';
        $description= $this->description;
        $role =$this->roleRepo->getById($id);
        $acls =$this->roleRepo->getWithJoin($id); 
        return view('acl::role.show',compact('role','acls','title','description'));
    }
    public function edit($id)
    {
        $title='Edit Leave';
        $description= $this->description;
        $role =$this->roleRepo->getById($id);
        $permission =$this->roleRepo->getAllPermission();
        $acls = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('acl::role.edit',compact('role','permission','acls','description','title'));
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
