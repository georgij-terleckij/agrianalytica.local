<?php

namespace Agrianalytica\Admin\Repositories;

use Illuminate\Support\Facades\DB;

class PermissionRepository
{
    public function getAll()
    {
        return DB::table('permissions')->get();
    }

    public function getByRole($roleId)
    {
        return DB::table('role_permissions')
            ->where('role_id', $roleId)
            ->pluck('permission_id')
            ->toArray();
    }
}
