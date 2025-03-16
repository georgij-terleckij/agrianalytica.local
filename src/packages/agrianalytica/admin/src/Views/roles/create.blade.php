@extends('admin::layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Добавить новую роль</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="role_name" class="form-label">Название роли</label>
                    <input type="text" class="form-control" id="role_name" name="name" required>
                </div>
                <button type="submit" class="btn btn-success">Создать</button>
            </form>
        </div>
    </div>
@endsection
