<?php

namespace Agrianalytica\Admin\Repositories;

use Illuminate\Support\Facades\DB;

class RoleRepository
{
    protected $table = 'roles';

    public function getAll(bool $withPermissionsCount = false)
    {
        $query = DB::table('roles');

        if ($withPermissionsCount) {
            $query->leftJoin('role_permissions', 'roles.id', '=', 'role_permissions.role_id')
                ->select('roles.*', DB::raw('COUNT(role_permissions.permission_id) as permissions_count'))
                ->groupBy('roles.id');
        } else {
            $query->select('roles.*'); // Обычный запрос без COUNT()
        }

        return $query->get();
    }

    public function getAllWithPermissions()
    {
        $roles = DB::table('roles')->get();

        foreach ($roles as $role) {
            $role->permissions = DB::table('role_permissions')
                ->join('permissions', 'role_permissions.permission_id', '=', 'permissions.id')
                ->where('role_permissions.role_id', $role->id)
                ->pluck('permissions.name');
        }

        return $roles;
    }

    public function findById($roleId)
    {
        return DB::table('roles')->where('id', $roleId)->first();
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

    public function updateRolePermissions(int $roleId,array $permissions)
    {
        DB::table('role_permissions')->where('role_id', $roleId)->delete(); // Удаляем старые права

        $data = [];
        foreach ($permissions as $permissionId) {
            $data[] = ['role_id' => $roleId, 'permission_id' => $permissionId];
        }

        if (!empty($data)) {
            DB::table('role_permissions')->insert($data); // Добавляем новые права
        }
    }
}
