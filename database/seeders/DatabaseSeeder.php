<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SiteSetting::class,
            User::class,
            Role::class,
            Permission::class,

    ]);
    }
}
