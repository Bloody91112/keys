<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StorePaymentRequest;
use App\Mail\FailPaymentMail;
use App\Mail\SuccessPaymentMail;
use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\Promocode;
use App\Models\PromocodeStatus;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function store(StorePaymentRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $paymentResult = true;

        if ($paymentResult){
            $data['status_id'] = PaymentStatus::successId();
        } else {
            $data['status_id'] = PaymentStatus::failedId();

        }

        $promocodes_ids = $data['ids'];
        unset($data['ids']);

        foreach ($promocodes_ids as $promocode_id){
            Promocode::find($promocode_id)->update(['status_id' => PromocodeStatus::archivedId()]);
            $data['promocode_id'] = $promocode_id;
            $payment = Payment::create($data);

            if ($paymentResult){
                Mail::to(User::find($data['user_id'])->email)->send(new SuccessPaymentMail($payment));
            } else {
                Mail::to(User::find($data['user_id'])->email)->send(new FailPaymentMail());
            }
        }

        return response()->json(['status' => $data['status_id']]);
    }
}
