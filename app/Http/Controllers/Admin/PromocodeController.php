<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePromocodeRequest;
use App\Http\Requests\Admin\UpdatePromocodeRequest;
use App\Models\Promocode;
use App\Repositories\Admin\PromocodeRepository;
use App\Services\Admin\PromocodeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PromocodeController extends Controller
{

    private PromocodeService $service;
    private PromocodeRepository $repository;

    public function __construct()
    {
        $this->service = new PromocodeService();
        $this->repository = new PromocodeRepository();
    }

    public function index(): View
    {
        return view('admin.pages.promocodes.index', $this->repository->indexData());
    }

    public function create(): View
    {
        return view('admin.pages.promocodes.item', $this->repository->createData());
    }

    public function store(StorePromocodeRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('admin.promocodes.index');
    }

    public function show(Promocode $promocode): RedirectResponse
    {
        return redirect()->route('admin.promocodes.edit', $promocode);
    }

    public function edit(Promocode $promocode): View
    {
        return view('admin.pages.promocodes.item', $this->repository->editData($promocode));
    }

    public function update(UpdatePromocodeRequest $request, Promocode $promocode): RedirectResponse
    {
        $this->service->update($request,$promocode);
        return redirect()->route('admin.promocodes.index');
    }

    public function destroy(Promocode $promocode): RedirectResponse
    {
        $this->service->delete($promocode);
        return redirect()->route('admin.promocodes.index');
    }
}
