<?php
namespace Modules\RolePermission\Database\Seeders;
use Illuminate\Database\Seeder;
use Modules\RolePermission\Entities\Permission;
  class RolePermissionDatabaseSeeder extends Seeder
  {
      /**
       * Run the database seeds.
       *
       * @return void
       */
      public function run()
      {
          $permissions = [
             'role-list',
             'role-create',
             'role-edit',
             'role-delete',
          ];
          foreach ($permissions as $permission) {
               Permission::create(['name' => $permission]);
          }
      }
  }