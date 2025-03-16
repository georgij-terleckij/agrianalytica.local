<?php

namespace Agrianalytica\Admin\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LandManagerRepository
{
    protected $table = 'land_managers';

    public function getAll(int $perPage = 10)
    {
        return DB::table($this->table)
            ->whereNull('deleted_at') // Фильтр, чтобы не показывать удалённые
            ->paginate($perPage);
    }

    public function getFiltered(?string $search, ?string $status, int $perPage = 10)
    {
        $query = DB::table($this->table)->whereNull('deleted_at');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%");
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        return $query->paginate($perPage);
    }

    public function create(array $data)
    {
        $uuid = Str::uuid()->toString();

        return DB::table($this->table)->insertGetId([
            'id' => $uuid,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'deleted_at' => null,
            'status' => $data['status'] ?? 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function update(string $id, array $data)
    {
        return DB::table($this->table)->where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'status' => $data['status'],
            'updated_at' => now(),
        ]);
    }

    public function findById(string $id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->whereNull('deleted_at') // Фильтр, чтобы не показывать удалённые
            ->first();
    }

    public function delete(string $id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update(['deleted_at' => now()]);
    }

    public function forceDelete(string $id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function bulkDelete(array $id)
    {
        return DB::table($this->table)->whereIn('id', $id)->delete();
    }

    public function bulkUpdateStatus(array $id, string $status)
    {
        return DB::table($this->table)->whereIn('id', $id)->update(['status' => $status]);
    }

    public function getTrashed(int $perPage = 10)
    {
        return DB::table($this->table)
            ->whereNotNull('deleted_at') // Показываем только удалённые
            ->paginate($perPage);
    }
}
