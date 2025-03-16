<?php

namespace Agrianalytica\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Agrianalytica\Admin\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAllRoles(true);
        return view('admin::roles.index', compact('roles'));
    }

    public function edit($roleId)
    {
        $data = $this->roleService->getRoleWithPermissions($roleId);
        return view('admin::roles.edit', $data);
    }

    public function create()
    {
        return view('admin::roles.create');
    }

    public function store(Request $request)
    {
        $this->roleService->createRole($request);
        return redirect()->route('admin.roles.index')->with('success', 'Роль создана!');
    }

    public function update(Request $request, $id)
    {
        $this->roleService->updateRolePermissions($id, $request->permissions ?? []);

        return redirect()->route('admin.roles.index')->with('success', 'Роль обновлена!');
    }

    public function destroy(int $role)
    {
        $this->roleService->deleteRole($role);
        return redirect()->route('admin.roles.index')->with('success', 'Роль удалена!');
    }
}
