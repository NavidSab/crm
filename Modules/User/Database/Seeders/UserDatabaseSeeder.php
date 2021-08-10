<?php
namespace Modules\User\Database\Seeders;
use Illuminate\Database\Seeder;
use Modules\User\Entities\User;
use Modules\RolePermission\Entities\Role;
use Modules\RolePermission\Entities\Permission;
class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'King Kraphics', 
            'email' => 'admin@king.graphic',
            'password' => bcrypt('12345678')
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
