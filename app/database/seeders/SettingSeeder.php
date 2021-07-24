<?php

namespace Database\Seeders;
use anlutro\LaravelSettings\Facade as Setting;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = array(
            'company_logo' => 'https://via.placeholder.com/180X100?text=Capstone',
            'company_name' => "Capstone",
            'company_email' => 'info@capstone.com',
        );
        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
        Setting::save();
    }
}
