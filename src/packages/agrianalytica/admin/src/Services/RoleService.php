<?php

namespace Agrianalytica\Admin\Services;

use Agrianalytica\Admin\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleService
{
    protected $roleRepository;
    protected $permissionService;

    public function __construct(RoleRepository $roleRepository, PermissionService $permissionService)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionService = $permissionService;
    }

    public function getAllRoles(bool $withPermissionsCount = false)
    {
        return $this->roleRepository->getAll($withPermissionsCount);
    }

    public function getRoleById($roleId)
    {
        return $this->roleRepository->findById($roleId);
    }

    public function getRoleWithPermissions($roleId)
    {
        $role = $this->getRoleById($roleId);
        $permissions = $this->permissionService->getAllPermissions();
        $rolePermissions = $this->permissionService->getPermissionsForRole($roleId);

        return compact('role', 'permissions', 'rolePermissions');
    }

    public function createRole(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        return $this->roleRepository->create($data);
    }

    public function updateRole(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        return $this->roleRepository->update($id, $data);
    }

    public function deleteRole(int $id)
    {
        return $this->roleRepository->delete($id);
    }

    public function updateRolePermissions(int $roleId, array $permissions)
    {
        return $this->roleRepository->updateRolePermissions($roleId, $permissions);
    }
}
