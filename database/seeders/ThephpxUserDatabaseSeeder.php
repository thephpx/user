<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Thephpx\User\Models\User;
use Thephpx\User\Models\Role;
use Thephpx\User\Models\Permission;

class ThephpxUserDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roleAdmin = Role::firstOrCreate(['name'=>'admin']);
        $roleMember = Role::firstOrCreate(['name'=>'member']);

        $permissionCreate = Permission::firstOrCreate(['name'=>'create']);
        $permissionReadAll = Permission::firstOrCreate(['name'=>'read-all']);
        $permissionReadSelf = Permission::firstOrCreate(['name'=>'read-self']);
        $permissionEditAll = Permission::firstOrCreate(['name'=>'edit-all']);
        $permissionEditSelf = Permission::firstOrCreate(['name'=>'edit-self']);
        $permissionRemoveAll = Permission::firstOrCreate(['name'=>'remove-all']);
        $permissionRemoveSelf = Permission::firstOrCreate(['name'=>'remove-self']);

        $roleAdmin->givePermissionTo($permissionCreate);
        $roleAdmin->givePermissionTo($permissionReadAll);
        $roleAdmin->givePermissionTo($permissionReadSelf);
        $roleAdmin->givePermissionTo($permissionEditAll);
        $roleAdmin->givePermissionTo($permissionEditSelf);
        $roleAdmin->givePermissionTo($permissionRemoveAll);
        $roleAdmin->givePermissionTo($permissionRemoveSelf);

        $roleMember->givePermissionTo($permissionCreate);
        $roleMember->givePermissionTo($permissionReadSelf);
        $roleMember->givePermissionTo($permissionEditSelf);
        $roleMember->givePermissionTo($permissionRemoveSelf);

        $adminUser = User::firstOrCreate(['first_name'=>'faisal','last_name'=>'ahmed','email'=>'thephpx@gmail.com','password'=>\Hash::make('faisal123')]);
        $adminUser->assignRole('admin');
    }
}
