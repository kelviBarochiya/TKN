<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesTableSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            ['name' => 'Departments'],
            ['name' => 'Services'],
            ['name' => 'Helpline Number'],
            ['name' => 'News and Update'],
            ['name' => 'About-Us Content'],
            ['name' => 'Holiday List'],
            ['name' => 'Councillors'],
            ['name' => 'Blogs'],
            ['name' => 'Image Presentation'],
            ['name' => 'Video Presentation'],
            ['name' => 'Categories'],
            ['name' => 'LifeCycles'],
            ['name' => 'Roles'],
            ['name' => 'Users'],
            ['name' => 'Complaints'],
            ['name' => 'Suggestions'],
            ['name' => 'Appreciations'],
            ['name' => 'Contact Us'],
            ['name' => 'Settings'],
            ['name' => 'Slider'],
            ['name' => 'Page Content'],
            ['name' => 'Banner Image'],
        ];

        DB::table('modules')->insert($modules);
    }
}
