@extends('admin::layouts.layout')

@section('title', 'Добавить клиента')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Добавить нового клиента</h1>

        <form action="{{ route('admin.land-managers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
