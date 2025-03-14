<?php

namespace Agrianalytica\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Agrianalytica\Admin\Models\Role;
use Agrianalytica\Admin\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('admin::roles', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('admin.roles.index')->with('success', 'Роль создана!');
    }

    public function assignPermission(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'array',
        ]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index')->with('success', 'Права обновлены!');
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update(['name' => $request->name]);

        return redirect()->route('admin.roles.index')->with('success', 'Роль обновлена!');
    }

    public function destroy(Role $role)
    {
        $role->permissions()->detach(); // Открепляем все права
        $role->admins()->detach(); // Открепляем всех админов
        $role->delete(); // Теперь удаляем
        return redirect()->route('admin.roles.index')->with('success', 'Роль удалена!');
    }
}
