<?php
namespace Modules\User\Repositories;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Hash;
use DB;
class UserRepo
{

    public function getWithPaginate()
    {
        return User::orderBy('id','DESC')->paginate(5);
    }
    public function getRoles()
    {
        $user = new User();
        return $user->roles();
    }
    public function findByRole(array $role){
        return User::whereIn('role',$role)->get();
       
    }
    public function getAll()
    {
        return User::orderBy('id','DESC')->get();
    }
    public function findById($id)
    {
        return User::find($id);
    }
    public function delete($id)
    {
        return User::find($id)->delete();
    }
    public function store($request)
    {
        return User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
    public function storeRole(array $role , $user)
    {
        return $user->roles()->sync($role);
    }
    public function deletePermission( $user_id)
    {
        return DB::table('permission_user')->where('user_id',$user_id)->delete();   
    }
    public function storePermission( $user_id)
    {
        $roles=DB::table('role_user')->where('user_id',$user_id)->get();
        if($roles){
            foreach($roles as $role){
                $permissions=DB::table('permission_role')->where('role_id',$role->role_id)->get();
                if($permissions){
                    foreach($permissions as $permission){
                        $count=DB::table('permission_user')->where(['user_id'=>$user_id,'permission_id'=>$permission->permission_id])->count();
                        if($count == 0){
                        DB::table('permission_user')->insert([
                            'permission_id' => $permission->permission_id,
                            'user_id'       => $user_id
                         ]);  
                        }
                    }
                }
            }
        }
    }
    public function syncPermission($role_id){
        $users=DB::table('role_user')->where('role_id',$role_id)->get();
        $permissions=DB::table('permission_role')->where('role_id',$role_id)->get();
        foreach($users as $user){
            DB::table('permission_user')->where('user_id',$user->user_id)->delete();
            foreach($permissions as $permission){
                DB::table('permission_user')->insert([
                    'permission_id' => $permission->permission_id,
                    'user_id'       => $user->user_id
                 ]);  
            }

        }
    }
    public function update($request)
    {
        if(!empty($request->password))
        { 
            $user =  User::find($request->user_id);
            $result = tap($user)->update([
                'name'        =>$request->name,
                'email'       =>$request->email,
                'password'    =>Hash::make($request->password),
            ]);
            return $result;
        }
        else{
            $user =  User::find($request->user_id);
            $result = tap($user)->update([
                'name'        =>$request->name,
                'email'       =>$request->email
            ]);
            return $result;
        }
    }
}
