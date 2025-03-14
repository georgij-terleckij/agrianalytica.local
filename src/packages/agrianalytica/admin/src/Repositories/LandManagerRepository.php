<?php

namespace Agrianalytica\Admin\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LandManagerRepository
{
    public function getAll()
    {
        return DB::table('land_managers')->get();
    }

    public function getFiltered(?string $search, ?string $status, int $perPage = 10)
    {
        $query = DB::table('land_managers');

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

        return DB::table('land_managers')->insertGetId([
            'uuid' => $uuid,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'status' => $data['status'] ?? 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function update(string $uuid, array $data)
    {
        return DB::table('land_managers')->where('uuid', $uuid)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'status' => $data['status'],
            'updated_at' => now(),
        ]);
    }

    public function findByUuid(string $uuid)
    {
        return DB::table('land_managers')->where('uuid', $uuid)->first();
    }

    public function delete(string $uuid)
    {
        return DB::table('land_managers')->where('uuid', $uuid)->delete();
    }

    public function bulkDelete(array $uuids)
    {
        return DB::table('land_managers')->whereIn('uuid', $uuids)->delete();
    }

    public function bulkUpdateStatus(array $uuids, string $status)
    {
        return DB::table('land_managers')->whereIn('uuid', $uuids)->update(['status' => $status]);
    }
}
