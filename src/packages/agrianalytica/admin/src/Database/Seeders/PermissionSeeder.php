<?php

namespace Agrianalytica\Admin\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['name' => 'view_users', 'description' => 'Просмотр пользователей'],
            ['name' => 'edit_users', 'description' => 'Редактирование пользователей'],
            ['name' => 'delete_users', 'description' => 'Удаление пользователей'],
            ['name' => 'create_users', 'description' => 'Создание пользователей'],
            ['name' => 'view_roles', 'description' => 'Просмотр ролей'],
            ['name' => 'edit_roles', 'description' => 'Редактирование ролей'],
            ['name' => 'delete_roles', 'description' => 'Удаление ролей'],
            ['name' => 'create_roles', 'description' => 'Создание ролей'],
            ['name' => 'view_reports', 'description' => 'Просмотр отчётов'],
            ['name' => 'generate_reports', 'description' => 'Генерация отчётов'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission['name'],
                'slug' => $permission['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
