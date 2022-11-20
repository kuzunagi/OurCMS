<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => 'author',
                'isAdmin' => true
            ],
            [
                'name' => 'developer',
                'isAdmin' => true
            ],
            [
                'name' => 'administrator',
                'isAdmin' => true
            ],
            [
                'name' => 'member',
                'isAdmin' => false
            ],
        ]);
    }
}
