<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermission = Permission::all();

        Role::updateOrCreate([
            "name"      => "Admin",
            "slug"      => "admin",
            "deletable" => false
        ])->permission()->sync($adminPermission->pluck("id"));

        Role::updateOrCreate([
            "name"      => "User",
            "slug"      => "user",
            "deletable" => false
        ]);
    }
}
