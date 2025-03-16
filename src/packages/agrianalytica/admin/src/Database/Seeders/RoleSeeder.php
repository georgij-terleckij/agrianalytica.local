<?php

namespace Agrianalytica\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'slug' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'dispatcher', 'slug' => 'Dispatcher', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'news_editor', 'slug' => 'News editor', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
