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
        $roles = $this->roleService->getAllRoles();
        return view('admin::roles', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->roleService->createRole($request);
        return redirect()->route('admin.roles.index')->with('success', 'Роль создана!');
    }

    public function update(Request $request, int $role)
    {
        $this->roleService->updateRole($request, $role);
        return redirect()->route('admin.roles.index')->with('success', 'Роль обновлена!');
    }

    public function destroy(int $role)
    {
        $this->roleService->deleteRole($role);
        return redirect()->route('admin.roles.index')->with('success', 'Роль удалена!');
    }

    public function assignPermission(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'array',
        ]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index')->with('success', 'Права обновлены!');
    }
}
