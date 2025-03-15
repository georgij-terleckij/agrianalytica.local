<?php
namespace Agrianalytica\Admin\Http\Controllers;

use Agrianalytica\Admin\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('role')->paginate(10);
        return view('admin::employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin::employees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $data['password'] = Hash::make($data['password']);

        Employee::create($data);

        return redirect()->route('admin.employees.index')->with('success', 'Сотрудник добавлен.');
    }

    public function edit(Employee $employee)
    {
        return view('admin::employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $employee->update($data);

        return redirect()->route('admin.employees.index')->with('success', 'Сотрудник обновлён.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Сотрудник удалён.');
    }

    public function toggleBan(Employee $employee)
    {
        $employee->update(['status' => $employee->status === 'active' ? 'banned' : 'active']);
        return redirect()->route('admin.employees.index')->with('success', 'Статус сотрудника изменён.');
    }
}
