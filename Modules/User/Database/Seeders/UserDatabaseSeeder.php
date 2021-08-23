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
        $user->assignRole('super-admin');
    }
}
