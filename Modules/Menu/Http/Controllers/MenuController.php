<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\Repositories\MenuRepo;
use Modules\Menu\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public $menuRepo;
    public function __construct(MenuRepo $menuRepo){
        $this->menuRepo=$menuRepo;
        $this->middleware('auth');
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data =$this->menuRepo->getAll();
        return view('user::index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->rolepermissionrRepo->getRoles();
            return view('user::create',compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = $this->menuRepo->store($request);
        $user->assignRole($request->input('roles'));
        return redirect()->route('index')->with('success','User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->menuRepo->find($id);
        return view('user::show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->menuRepo->find($id);
        $roles = $this->rolepermissionrRepo->getRoles();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('user::edit',compact('user','roles','userRole'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,'.$id,
    //         'password' => 'same:confirm-password',
    //         'roles' => 'required'
    //     ]);
    //     $input = $request->all();
    //     if(!empty($input['password'])){ 
    //         $input['password'] = Hash::make($input['password']);
    //     }else{
    //         $input = Arr::except($input,array('password'));    
    //     }
    //     $user = $this->menuRepo->find($id);
    //     $user->update($input);
    //     DB::table('model_has_roles')->where('model_id',$id)->delete();
    //     $user->assignRole($request->input('roles'));
    //     return redirect()->route('users.index')
    //                     ->with('success','User updated successfully');
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->menuRepo->delete($id);
        return redirect()->route('user')->with('success','User deleted successfully');
    }
}
