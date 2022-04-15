<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolehaspermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissions = Permission::all();
        // Admin Role
        $AdminRole = Role::where("name", "admin")->first();
        $AdminRole->SyncPermissions();
        foreach ($Permissions as $Permission) {
            $AdminRole->givePermissionTo($Permission['name']);
        }

        // $PermissionsForPublisher = Permission::all();
        $PermissionsForPublisher = Permission::whereIn('id', [20,21])->get();
        // Admin Role
        $PublisherRole = Role::where("name", "User")->first();
        $PublisherRole->SyncPermissions();
        foreach ($PermissionsForPublisher as $PermissionForPublisher) {
            $PublisherRole->givePermissionTo($PermissionForPublisher['name']);
        }
    }
}
