<?php

namespace Agrianalytica\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LandManagerSeeder extends Seeder
{
    public function run()
    {
        DB::table('land_managers')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Иванов Иван',
                'email' => 'ivanov@example.com',
                'phone' => '+380123456789',
                'status' => 'active',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Петров Петр',
                'email' => 'petrov@example.com',
                'phone' => '+380987654321',
                'status' => 'banned',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
