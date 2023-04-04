<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\StorePaymentRequest;
use App\Http\Requests\Admin\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\Promocode;
use App\Models\PromocodeStatus;

class PaymentService
{
    public function store(StorePaymentRequest $request): void
    {
        $data = $request->validated();
        $this->updatePromocodeStatus($data);
        Payment::create($data);
    }

    public function update(UpdatePaymentRequest $request, Payment $payment): void
    {
        $data = $request->validated();
        $this->updatePromocodeStatus($data);
        $payment->update($data);
    }

    public function delete(Payment $payment): void
    {
        $payment->delete();
    }

    private function updatePromocodeStatus($requestArray): void
    {
        $promocode = Promocode::find($requestArray['promocode_id']);

        if ( (int) $requestArray['status_id'] === PaymentStatus::where('title', '=', 'success')->first()->id){
            $promocode->update(
                ['status_id' => PromocodeStatus::where('title', '=', 'archived')->first()->id]
            );
        }
        if ( (int) $requestArray['status_id'] === PaymentStatus::where('title', '=', 'failed')->first()->id){
            $promocode->update(
                ['status_id' => PromocodeStatus::where('title', '=', 'reserve')->first()->id]
            );
        }
    }
}
