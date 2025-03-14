<?php

namespace Agrianalytica\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Agrianalytica\Admin\Models\LandManager;

class AdminController extends Controller
{
    public function index()
    {
        // Подсчитываем активных и заблокированных клиентов
        $clientsStatusData = [
            'active' => LandManager::where('status', 'active')->count(),
            'banned' => LandManager::where('status', 'banned')->count(),
        ];

        // Получаем новых клиентов за последние 30 дней
        $newClientsData = LandManager::where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Подготавливаем данные для графика
        $chartData = [
            'dates' => $newClientsData->pluck('date'),
            'counts' => $newClientsData->pluck('count'),
        ];

        return view('admin::dashboard', [
            'clientsStatusData' => array_values($clientsStatusData),
            'newClientsData' => $chartData,
        ]);
    }
}
