<?php

namespace Agrianalytica\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Agrianalytica\Admin\Database\Seeders\RoleSeeder;
use Agrianalytica\Admin\Database\Seeders\LandManagerSeeder;
use Agrianalytica\Admin\Database\Seeders\EmployeeSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            LandManagerSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
