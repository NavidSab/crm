<?php
namespace Modules\User\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\UserRepo;
use Modules\User\Http\Requests\UserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
use Modules\RolePermission\Repositories\RolePermissionRepo;
use DB;



class UserController extends Controller
{
    public $userRepo;
    public $rolepermissionrRepo;
    public function __construct(UserRepo $userRepo,RolePermissionRepo $rolepermissionrRepo ){
        $this->userRepo=$userRepo;
        $this->rolepermissionrRepo=$rolepermissionrRepo;
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $data =$this->userRepo->getAll();
        return view('user::index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $roles = $this->rolepermissionrRepo->getRoles();
            return view('user::create',compact('roles'));
    }
    public function store(UserRequest $request)
    {
        $user = $this->userRepo->store($request);
        $user->assignRole($request->input('roles'));
        return redirect()->route('user')->with('success','User created successfully');
    }
    public function show($id)
    {
        $user = $this->userRepo->findById($id);
        return view('user::show',compact('user'));
    }
    public function edit($id)
    {
        $user = $this->userRepo->findById($id);
        $roles = $this->rolepermissionrRepo->getRoles();
        $userRole = $user->roles->pluck('id')->all();
        return view('user::edit',compact('user','roles','userRole'));
    }
    public function update(UpdateUserRequest $request)
    {
        $user=$this->userRepo->update($request);
        DB::table('model_has_roles')->where('model_id',$request->user_id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('user')->with('success','User updated successfully');
    }
    public function destroy($id)
    {
        $this->userRepo->delete($id);
        return redirect()->route('user')->with('success','User deleted successfully');
    }
}
