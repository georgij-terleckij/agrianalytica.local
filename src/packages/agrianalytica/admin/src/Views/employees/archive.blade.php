@extends('admin::layouts.layout')

@section('content')
    <div class="container">
        <h2>Архив сотрудников</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Дата удаления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->role_id }}</td>
                    <td>{{ $employee->deleted_at }}</td>
                    <td>
                        <form action="{{ route('admin.employees.restore', $employee->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Восстановить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
