@extends('admin::layouts.layout')

@section('title', 'Статистика')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Статистика клиентов</h1>

        <div class="row">
            <!-- Диаграмма активных и заблокированных клиентов -->
            <div class="col-md-6">
                <canvas id="clientsStatusChart"></canvas>
            </div>

            <!-- График новых клиентов -->
            <div class="col-md-6">
                <canvas id="newClientsChart"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('top-scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Данные для диаграммы (берём из PHP)
            let clientsStatusData = @json($clientsStatusData);
            let newClientsData = @json($newClientsData);

            // График активных / заблокированных клиентов
            new Chart(document.getElementById('clientsStatusChart'), {
                type: 'doughnut',
                data: {
                    labels: ["Активные", "Заблокированные"],
                    datasets: [{
                        data: clientsStatusData,
                        backgroundColor: ['#28a745', '#dc3545']
                    }]
                }
            });

            // График новых клиентов за месяц
            new Chart(document.getElementById('newClientsChart'), {
                type: 'line',
                data: {
                    labels: newClientsData.dates,
                    datasets: [{
                        label: "Новые клиенты",
                        data: newClientsData.counts,
                        borderColor: "#007bff",
                        fill: false
                    }]
                }
            });
        });
    </script>
@endpush
