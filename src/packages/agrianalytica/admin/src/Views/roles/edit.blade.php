@extends('admin::layouts.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Редактирование роли: {{ $role->name }}</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Название роли</label>
                        <input type="text" name="name" value="{{ $role->name }}" class="form-control" disabled>
                    </div>

                    <h4>Права доступа</h4>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                           value="{{ $permission->id }}"
                                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $permission->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fas fa-save"></i> Сохранить
                    </button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary mt-3">
                        <i class="fas fa-arrow-left"></i> Назад
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
