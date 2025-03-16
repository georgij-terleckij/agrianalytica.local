<?php

namespace Agrianalytica\Admin\Http\Controllers;

use Agrianalytica\Admin\Models\Employee;
use Agrianalytica\Admin\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Agrianalytica\Admin\Services\EmployeeService;

class EmployeeController extends Controller
{
    protected EmployeeService $service;
    protected RoleService $roleService;

    public function __construct(EmployeeService $employeeService, RoleService $roleService)
    {
        $this->service = $employeeService;
        $this->roleService = $roleService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $role = $request->input('role');
        $perPage = $request->input('per_page', 10); // 👈 Количество записей на страницу

        $employees = $this->service->getFiltered($search, $status, $role, $perPage);

        return view('admin::employees.index', compact('employees'));
    }

    public function create()
    {
        $roles = $this->roleService->getAllRoles();
        return view('admin::employees.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:active,banned',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $data['password'] = Hash::make($data['password']);
        $this->service->create($data);
        return redirect()->route('admin.employees.index')
            ->with('success', 'Сотрудник успешно добавлен!');
    }

    public function edit(string $id)
    {
        $employee = $this->service->getById($id);

        if (!$employee) {
            return redirect()->route('admin.employees.index')->with('error', 'Сотрудник не найден.');
        }

        $roles = $this->roleService->getAllRoles();

        return view('admin::employees.edit', compact('employee', 'roles'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:active,banned',
            'password' => 'nullable|min:6|confirmed'
        ]);

        if (empty($data['password'])) {
            unset($data['password']); // Если пароль не указан, оставляем старый
        } else {
            $data['password'] = Hash::make($data['password']); // Хешируем пароль
        }

        $this->service->update($id, $data);

        return redirect()->route('admin.employees.index')->with('success', 'Сотрудник обновлён!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Сотрудник удалён.');
    }

    public function restore(string $id)
    {
        $this->service->restore($id);
        return redirect()->route('admin.employees.archive')->with('success', 'Сотрудник восстановлен!');
    }

    public function archive()
    {
        $employees = $this->service->getArchived();
        return view('admin::employees.archive', compact('employees'));
    }
}
