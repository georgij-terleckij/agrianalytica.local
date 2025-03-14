@extends('admin::layout')

@section('title', 'Управление ролями')

@section('content')
    <h2>Управление ролями</h2>

    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Название роли">
        <button type="submit">Создать роль</button>
    </form>

    <h3>Список ролей</h3>
    <ul>
        @foreach($roles as $role)
            <li>
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $role->name }}">
                    <button type="submit">Обновить</button>
                </form>

                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>

                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');">
                        <i class="bi bi-trash"></i> Delete</button>
                </form>
            </li>
{{--            <li>--}}
{{--                <strong>{{ $role->name }}</strong>--}}
{{--                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display:inline;">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit">Удалить</button>--}}
{{--                </form>--}}

{{--                <form action="{{ route('admin.roles.assignPermissions', $role) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <label>Права:</label>--}}
{{--                    <select name="permissions[]" multiple>--}}
{{--                        @foreach($permissions as $permission)--}}
{{--                            <option value="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'selected' : '' }}>--}}
{{--                                {{ $permission->name }}--}}
{{--                            </option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <button type="submit">Обновить</button>--}}
{{--                </form>--}}
{{--            </li>--}}
        @endforeach
    </ul>
@endsection
