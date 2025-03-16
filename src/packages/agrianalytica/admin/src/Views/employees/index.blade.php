@extends('admin::layouts.layout')

@section('content')
    <div class="container mt-3">
        <h2>Сотрудники</h2>

        <a href="{{ route('admin.employees.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Добавить сотрудника
        </a>

        <form method="GET" action="{{ route('admin.employees.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Поиск по имени или email" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">Все</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Активен</option>
                        <option value="banned" {{ request('status') == 'banned' ? 'selected' : '' }}>Заблокирован</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="role" class="form-control">
                        <option value="">Все роли</option>
                        <option value="1" {{ request('role') == '1' ? 'selected' : '' }}>Админ</option>
                        <option value="2" {{ request('role') == '2' ? 'selected' : '' }}>Диспетчер</option>
                        <option value="3" {{ request('role') == '3' ? 'selected' : '' }}>Редактор новостей</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Фильтр</button>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
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
                    <td>{{ $employee->role_id }}</td>
                    <td>
                    <span class="badge {{ $employee->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                        {{ $employee->status === 'active' ? 'Активен' : 'Заблокирован' }}
                    </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                        <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Добавляем пагинацию -->
        <div class="d-flex justify-content-center mt-3">
            {{ $employees->links() }}
        </div>

        {{ $employees->links() }}
    </div>
@endsection

@push('styles')
<style>
    .table {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .table th {
        background: #343a40;
        color: #fff;
        text-align: center;
    }

    .table td {
        text-align: center;
    }

    .badge-success {
        background: #28a745;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .badge-danger {
        background: #dc3545;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .pagination {
        justify-content: center;
    }

    .pagination .page-item.active .page-link {
        background: #007bff;
        border-color: #007bff;
    }
</style>
@endpush
