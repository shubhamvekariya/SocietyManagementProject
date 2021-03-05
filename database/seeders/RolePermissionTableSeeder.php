<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::create(['guard_name' => 'society', 'name' => 'secretary']);
        Role::create(['name' => 'member']);
        Role::create(['guard_name' => 'staff_security', 'name' => 'staff']);
        Role::create(['guard_name' => 'staff_security', 'name' => 'security']);
        Role::create(['name' => 'committeemember']);
    }
}
