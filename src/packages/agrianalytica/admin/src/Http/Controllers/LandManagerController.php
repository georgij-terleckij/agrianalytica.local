<?php

namespace Agrianalytica\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Agrianalytica\Admin\Services\LandManagerService;
use Illuminate\Support\Facades\Log;

class LandManagerController extends Controller
{
    protected $service;

    public function __construct(LandManagerService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $clients = $this->service->getFiltered(
            $request->input('search'),
            $request->input('status'),
            $request->input('per_page', 10) // Количество записей на страницу (по умолчанию 10)
        );

        return view('admin::land_managers.index', compact('clients'));
    }


    public function store(Request $request)
    {
        $this->service->create($request);
        return redirect()->route('admin.land-managers.index')->with('success', 'Клиент успешно создан ✅');

    }

    public function create()
    {
        return view('admin::land_managers.create');
    }

    public function show(string $id)
    {
        $client = $this->service->getByUuid($id);
        return view('admin::land_managers.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = $this->service->getByUuid($id);
        return view('admin::land_managers.edit', compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $this->service->update($request, $id);
        return redirect()->route('admin.land-managers.index')->with('success', 'Данные клиента обновлены ✅');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return redirect()->route('admin.land-managers.index')->with('success', 'Клиент удалён ❌');

    }

    public function bulkDelete(Request $request)
    {
        $this->service->bulkDelete($request->input('id', []));
        return back()->with('success', 'Выбранные клиенты удалены ❌');
    }

    public function bulkBan(Request $request)
    {
        $this->service->bulkUpdateStatus($request->input('id', []), 'banned');
        return back()->with('success', 'Выбранные клиенты заблокированы 🔒');
    }

    public function bulkUnban(Request $request)
    {
        $this->service->bulkUpdateStatus($request->input('id', []), 'active');
        return back()->with('success', 'Выбранные клиенты разблокированы 🔓');
    }
}
