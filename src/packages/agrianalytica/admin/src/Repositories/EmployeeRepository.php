<?php

namespace Agrianalytica\Admin\Repositories;

use Agrianalytica\Admin\Models\Employee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeRepository
{
    protected $table = 'employees';

    public function getAll($perPage = 10)
    {
        return DB::table($this->table)
            ->whereNull('deleted_at') // Фильтр удалённых
            ->paginate($perPage);
    }

    public function getFiltered(?string $search, ?string $status, ?string $role, int $perPage = 10)
    {
        $query = DB::table($this->table)
            ->select('id', 'name', 'email', 'role_id', 'status', 'created_at');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%");
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($role) {
            $query->where('role_id', $role);
        }

        return $query->paginate($perPage);
    }


    public function findById($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->first();
    }

    public function create(array $data)
    {
        $uuid = Str::uuid()->toString();

        return DB::table($this->table)->insertGetId([
            'id' => $uuid,
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'] ?? null,
            'status' => $data['status'] ?? 'active',
            'password' => $data['password'],
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function update($id, array $data)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update(array_merge($data, [
                'updated_at' => now()
            ]));
    }

    public function delete($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update(['deleted_at' => now()]);
    }

    public function restore($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update(['deleted_at' => null]);
    }

    public function getDeleted()
    {
        return DB::table($this->table)
            ->whereNotNull('deleted_at')
            ->get();
    }

    public function forceDelete($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function getArchived()
    {
        return DB::table($this->table)->whereNotNull('deleted_at')->paginate(10);
    }
}

