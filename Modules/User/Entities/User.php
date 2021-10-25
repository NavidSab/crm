<?php
namespace Modules\User\Entities;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\Acl\Entities\Role;
use Modules\Acl\Entities\Permission;
use NotificationChannels\WebPush\HasPushSubscriptions;


class User extends Authenticatable
{
    use  Notifiable,HasPushSubscriptions;

    protected $fillable = ['name','email','password'];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function hasRole( $roles)
    {
        if(is_array($roles)){
            foreach($roles as $role)
            {
                if($this->roles->contains('name',$role) && is_string($role))
                {
                    return true;
                }
            }
            return false;
        }
        if(is_string($roles)){
            return $this->roles->contains('name',$roles);
        }
    }
    public function assignRole($role){
        $this->role()->sync(Role::whereName($role->name)->firstorFail()); 
    }
    public function hasPermission(string $permission)
    {
        if($this->permissions()->where('name', $permission)->first())
        { 
            return true;
        }
        else
        {
            return false;
        }
    }
    public function hasPermissionThroughRole($permission)
    {
        if (is_array($permission->roles) || is_object($permission->roles))
        {
            foreach($permission->roles as $role)
            {
                if($this->roles->contains($role))
                {
                    return true;
                }
            }
        }
        return false;
    }
    public function getPermissions(array $permissions)
    {
        return Permission::whereIn('name',$permissions)->get();
    }
    public function storePermission( array $permission)
    {
        $permissions = $this->getPermissions(array_flatten($permission));
        if($permissions === null)
        {
            return $this;
        }  
        $this->permissions()->saveMany($permissions);
        return $this; 
    }
    public function deletePermission(array $permission)
    {
        $permissions = $this->getPermissions(array_flatten($permission));
        $this->permissions()->detach($permissions);
        return $this;
    }
    public function updatePermission(array $permissions)
    {
        $this->permissions()->detach();
        return $this->storePermission($permissions);
    }
}
