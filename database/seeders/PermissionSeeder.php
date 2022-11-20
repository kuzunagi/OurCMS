<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                'name' => 'viewUser'
            ],
            [
                'name' => 'createUser'
            ],
            [
                'name' => 'updateUser'
            ],
            [
                'name' => 'softDeleteUser'
            ],
            [
                'name' => 'permDeleteUser'
            ],
            [
                'name' => 'viewRole'
            ],
            [
                'name' => 'createRole'
            ],
            [
                'name' => 'updateRole'
            ],
            [
                'name' => 'softDeleteRole'
            ],
            [
                'name' => 'permDeleteRole'
            ],
            [
                'name' => 'viewPermission'
            ],
            [
                'name' => 'createPermission'
            ],
            [
                'name' => 'updatePermission'
            ],
            [
                'name' => 'softDeletePermission'
            ],
            [
                'name' => 'permDeletePermission'
            ],
        ]);
    }
}
