<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\StorePaymentRequest;
use App\Http\Requests\Admin\UpdatePaymentRequest;
use App\Models\Payment;
use App\Repositories\Admin\PaymentRepository;
use App\Services\Admin\PaymentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    private PaymentService $service;
    private PaymentRepository $repository;

    public function __construct()
    {
        $this->service = new PaymentService();
        $this->repository = new PaymentRepository();
    }

    public function index(): View
    {
        return view('admin.pages.payments.index', $this->repository->indexData());
    }

    public function create(): View
    {
        return view('admin.pages.payments.item', $this->repository->createData());
    }

    public function store(StorePaymentRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('admin.payments.index');
    }

    public function show(Payment $payment): RedirectResponse
    {
        return redirect()->route('admin.payments.edit', $payment);
    }

    public function edit(Payment $payment): View
    {
        return view('admin.pages.payments.item', $this->repository->editData($payment));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment): RedirectResponse
    {
        $this->service->update($request,$payment);
        return redirect()->route('admin.payments.index');
    }

    public function destroy(Payment $payment): RedirectResponse
    {
        $this->service->delete($payment);
        return redirect()->route('admin.payments.index');
    }
}
