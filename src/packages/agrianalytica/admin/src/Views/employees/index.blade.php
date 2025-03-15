@extends('admin::layout')

@section('content')
    <div class="container mt-4">
        <h2>Сотрудники</h2>
        <a href="{{ route('admin.employees.create') }}" class="btn btn-primary mb-3">Добавить сотрудника</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->role->name ?? '-' }}</td>
                    <td>
                        @if ($employee->status === 'active')
                            <span class="badge badge-success">Активен</span>
                        @else
                            <span class="badge badge-danger">Заблокирован</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                        @if ($employee->status === 'banned')
                            <form action="{{ route('admin.employees.unban', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Разблокировать</button>
                            </form>
                        @else
                            <form action="{{ route('admin.employees.ban', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Заблокировать</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
