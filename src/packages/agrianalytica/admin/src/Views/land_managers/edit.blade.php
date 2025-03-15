@extends('admin::layouts.layout')

@section('title', 'Редактировать клиента')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Редактировать клиента</h1>

        <form action="{{ route('admin.land-managers.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $client->phone }}">
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" id="status" name="status">
                    <option value="active" {{ $client->status === 'active' ? 'selected' : '' }}>Активен</option>
                    <option value="banned" {{ $client->status === 'banned' ? 'selected' : '' }}>Заблокирован</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Сохранить изменения</button>
            <a href="{{ route('admin.land-managers.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection
