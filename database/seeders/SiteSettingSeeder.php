<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::insert([
            [
                'name' => 'author',
                'value' => '7MuS'
            ],
            [
                'name' => 'theme',
                'value' => 'adminlte3'
            ],
            [
                'name' => 'appName',
                'value' => 'OurCMS'
            ],
        ]);
    }
}
