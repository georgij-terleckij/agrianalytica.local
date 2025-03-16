<?php

namespace Agrianalytica\Admin\Services;

use Agrianalytica\Admin\Repositories\PermissionRepository;

class PermissionService
{
    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAllPermissions()
    {
        return $this->permissionRepository->getAll();
    }

    public function getPermissionsForRole($roleId)
    {
        return $this->permissionRepository->getByRole($roleId);
    }
}
