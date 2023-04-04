<?php

namespace App\Repositories\Admin;

use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\Promocode;
use App\Models\User;

class PaymentRepository
{
    private function relations(): array
    {
        $promocodes = Promocode::all();
        $statuses = PaymentStatus::all();
        $users = User::all();
        return compact('promocodes', 'statuses', 'users');
    }

    public function editData(Payment $payment): array
    {
        $data = $this->relations();
        $data['model'] = $payment;
        $data['route'] = [
            'action' => route('admin.payments.update', $payment->id),
            'method' => 'patch'
        ];
        $data['pageTitle'] = 'Payments | ' . $payment->id;
        $data['pageH1'] = 'Payments - ' . $payment->id;
        return $data;
    }

    public function createData(): array
    {
        $data = $this->relations();
        $data['model'] = null;
        $data['route'] = [
            'action' => route('admin.payments.store'),
            'method' => 'post'
        ];
        $data['pageTitle'] = 'New payment';
        $data['pageH1'] = 'New payment';
        return $data;
    }

    public function indexData(): array
    {
        $data['models'] = Payment::paginate(10);
        $data['pageTitle'] = 'Payments';
        $data['pageH1'] = 'Payments';
        $data['tableAttributes'] = ['id','status_id','promocode_id', 'user_id'];
        $data['route'] = 'admin.payments';
        return $data;
    }
}

