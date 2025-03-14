<?php

namespace Agrianalytica\Admin\Repositories;

use Illuminate\Support\Facades\DB;

class RoleRepository
{
    public function getAll()
    {
        return DB::table('roles')->get();
    }

    public function create(array $data)
    {
        return DB::table('roles')->insertGetId([
            'name' => $data['name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function update(int $id, array $data)
    {
        return DB::table('roles')->where('id', $id)->update([
            'name' => $data['name'],
            'updated_at' => now(),
        ]);
    }

    public function delete(int $id)
    {
        DB::table('role_permissions')->where('role_id', $id)->delete();
        DB::table('admin_roles')->where('role_id', $id)->delete();
        return DB::table('roles')->where('id', $id)->delete();
    }
}
