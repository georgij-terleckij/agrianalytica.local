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

    public function getTrashedLandManagers($perPage = 10)
    {
        return $this->repo->getTrashed($perPage);
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

    public function getByUuid(string $id)
    {
        return $this->repo->findById($id);
    }


    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:land_managers,email,' . $id . ',id',
            'phone' => 'nullable',
            'status' => 'required|in:active,banned',
        ]);

        return $this->repo->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repo->delete($id);
    }

    public function restoreLandManager($id)
    {
        return $this->repo->restore($id);
    }

    public function forceDeleteLandManager($id)
    {
        return $this->repo->forceDelete($id);
    }

    public function bulkDelete(array $id)
    {
        return $this->repo->bulkDelete($id);
    }

    public function bulkUpdateStatus(array $id, string $status)
    {
        if (!empty($id)) {
            return $this->repo->bulkUpdateStatus($id, $status);
        }
        return false;
    }

}
