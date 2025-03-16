@extends('admin::layouts.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Управление ролями и правами</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Название роли</th>
                        <th>Права</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td><strong>{{ $role->name }}</strong></td>
                            <td>
                            <td>
                                @isset($role->permissions_count)
                                    <span class="badge badge-success">{{ $role->permissions_count }} прав</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endisset
                            </td>
                            </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Изменить
                                </a>
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить роль?')">
                                        <i class="fas fa-trash"></i> Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <a href="{{ route('admin.roles.create') }}" class="btn btn-success mt-3">
                    <i class="fas fa-plus"></i> Добавить роль
                </a>
            </div>
        </div>
    </div>
@endsection
