@extends('admin::layouts.layout')

@section('title', 'Просмотр клиента')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Данные клиента</h1>

        <p><strong>Имя:</strong> {{ $client->name }}</p>
        <p><strong>Email:</strong> {{ $client->email }}</p>
        <p><strong>Телефон:</strong> {{ $client->phone }}</p>
        <p><strong>Статус:</strong>
            <span class="badge badge-{{ $client->status === 'active' ? 'success' : 'danger' }}">
                {{ ucfirst($client->status) }}
            </span>
        </p>

        <a href="{{ route('admin.land-managers.index') }}" class="btn btn-secondary">Назад</a>
    </div>
@endsection
