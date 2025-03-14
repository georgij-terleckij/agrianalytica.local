@extends('admin::layout')

@section('title', 'Управление ролями')

@section('content')
    <h2>Управление ролями</h2>

    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Название роли">
        <button type="submit">Создать</button>
    </form>

    <h3>Список ролей</h3>
    <ul>
        @foreach($roles as $role)
            <li>
                <form action="{{ route('admin.roles.update', ['role' => $role->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $role->name }}">
                    <button type="submit">Обновить</button>
                </form>

                <form action="{{ route('admin.roles.destroy', ['role' => $role->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
