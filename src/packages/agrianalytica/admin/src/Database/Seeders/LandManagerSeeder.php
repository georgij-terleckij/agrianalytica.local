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
                'uuid' => Str::uuid(),
                'name' => 'Иванов Иван',
                'email' => 'ivanov@example.com',
                'phone' => '+380123456789',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Петров Петр',
                'email' => 'petrov@example.com',
                'phone' => '+380987654321',
                'status' => 'banned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
