<?php

namespace Agrianalytica\Admin\Services;

use Agrianalytica\Admin\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleService
{
    protected $roleRepo;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    public function getAllRoles()
    {
        return $this->roleRepo->getAll();
    }

    public function createRole(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        return $this->roleRepo->create($data);
    }

    public function updateRole(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        return $this->roleRepo->update($id, $data);
    }

    public function deleteRole(int $id)
    {
        return $this->roleRepo->delete($id);
    }
}
