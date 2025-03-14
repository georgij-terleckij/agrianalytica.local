<?php

namespace Agrianalytica\Admin\Services;

use Agrianalytica\Admin\Repositories\LandManagerRepository;
use Illuminate\Http\Request;

class LandManagerService
{
    protected $repo;

    public function __construct(LandManagerRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function getFiltered(?string $search, ?string $status, int $perPage = 10)
    {
        return $this->repo->getFiltered($search, $status, $perPage);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:land_managers,email',
            'phone' => 'nullable',
        ]);

        return $this->repo->create($data);
    }

    public function getByUuid(string $uuid)
    {
        return $this->repo->findByUuid($uuid);
    }


    public function update(Request $request, string $uuid)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:land_managers,email,' . $uuid . ',uuid',
            'phone' => 'nullable',
            'status' => 'required|in:active,banned',
        ]);

        return $this->repo->update($uuid, $data);
    }

    public function delete(int $id)
    {
        return $this->repo->delete($id);
    }

    public function bulkDelete(array $uuids)
    {
        return $this->repo->bulkDelete($uuids);
    }

    public function bulkUpdateStatus(array $uuids, string $status)
    {
        if (!empty($uuids)) {
            return $this->repo->bulkUpdateStatus($uuids, $status);
        }
        return false;
    }

}
