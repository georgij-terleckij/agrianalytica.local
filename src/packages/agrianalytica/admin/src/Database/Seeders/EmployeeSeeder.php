<?php

namespace Agrianalytica\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Agrianalytica\Admin\Models\Employee;
use Agrianalytica\Admin\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $dispatcherRole = Role::where('name', 'dispatcher')->first();
        $editorRole = Role::where('name', 'news_editor')->first();

        if (!$adminRole || !$dispatcherRole || !$editorRole) {
            $this->command->error('Роли не найдены! Выполните `php artisan db:seed --class=RoleSeeder`');
            return;
        }

        Employee::insert([
            [
                'id' => Str::uuid(),
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role_id' => $adminRole->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Dispatcher User',
                'email' => 'dispatcher@example.com',
                'password' => Hash::make('password'),
                'role_id' => $dispatcherRole->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Editor User',
                'email' => 'editor@example.com',
                'password' => Hash::make('password'),
                'role_id' => $editorRole->id,
            ],
        ]);
    }
}
