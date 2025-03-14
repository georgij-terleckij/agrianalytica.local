@extends('admin::layouts.layout')

@section('title', 'Список клиентов')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Клиенты</h1>
        <a href="{{ route('admin.land-managers.create') }}" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Добавить клиента
        </a>
        <form method="GET" action="{{ route('admin.land-managers.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="🔍 Поиск по имени или email"
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-control">
                        <option value="">Все</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>🟢 Активные</option>
                        <option value="banned" {{ request('status') === 'banned' ? 'selected' : '' }}>🔴 Заблокированные</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="per_page" class="form-control">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Фильтр</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('admin.land-managers.index') }}" class="btn btn-secondary"><i class="fas fa-sync-alt"></i> Сброс</a>
                </div>
            </div>
        </form>

        <div class="mb-3">
            <button type="button" class="btn btn-danger" id="bulk-delete"><i class="fas fa-trash-alt"></i> Удалить</button>
            <button type="button" class="btn btn-warning" id="bulk-ban"><i class="fas fa-user-slash"></i> Забанить</button>
            <button type="button" class="btn btn-success" id="bulk-unban"><i class="fas fa-user-check"></i> Разбанить</button>
        </div>

        <table class="table table-hover table-bordered">
            <thead class="table-dark">
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>Имя</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($clients as $client)
                <tr>
                    <td><input type="checkbox" class="select-client" value="{{ $client->uuid }}"></td>
                    <td><i class="fas fa-user"></i> {{ $client->name }}</td>
                    <td><i class="fas fa-envelope"></i> {{ $client->email }}</td>
                    <td><i class="fas fa-phone"></i> {{ $client->phone }}</td>
                    <td>
                        @if($client->status === 'active')
                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> Активен</span>
                        @else
                            <span class="badge bg-danger"><i class="fas fa-ban"></i> Заблокирован</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.land-managers.show', $client->uuid) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Просмотр
                        </a>
                        <a href="{{ route('admin.land-managers.edit', $client->uuid) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Редактировать
                        </a>
                        <form action="{{ route('admin.land-managers.destroy', $client->uuid) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Нет клиентов</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $clients->appends(request()->query())->links() }}
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById('select-all').addEventListener('click', function() {
                document.querySelectorAll('.select-client').forEach(cb => cb.checked = this.checked);
            });

            function bulkAction(url) {
                let selected = Array.from(document.querySelectorAll('.select-client:checked')).map(cb => cb.value);
                if (selected.length === 0) {
                    alert('Выберите хотя бы одного клиента!');
                    return;
                }

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ uuids: selected })
                }).then(() => location.reload());
            }

            document.getElementById('bulk-delete').addEventListener('click', () => bulkAction('{{ route('admin.land-managers.bulk-delete') }}'));
            document.getElementById('bulk-ban').addEventListener('click', () => bulkAction('{{ route('admin.land-managers.bulk-ban') }}'));
            document.getElementById('bulk-unban').addEventListener('click', () => bulkAction('{{ route('admin.land-managers.bulk-unban') }}'));
        });
    </script>
@endpush
