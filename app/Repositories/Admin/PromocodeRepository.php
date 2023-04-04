<?php

namespace App\Repositories\Admin;

use App\Models\Product;
use App\Models\Promocode;
use App\Models\PromocodeStatus;

class PromocodeRepository
{
    private function relations(): array
    {
        $products = Product::all();
        $statuses = PromocodeStatus::all();
        return compact('products', 'statuses');
    }

    public function editData(Promocode $promocode): array
    {
        $data = $this->relations();
        $data['model'] = $promocode;
        $data['products'] = $promocode->product()->orderByDesc('created_at')->get();
        $data['route'] = [
            'action' => route('admin.promocodes.update', $promocode->id),
            'method' => 'patch'
        ];
        $data['pageTitle'] = 'Promocodes | ' . $promocode->id;
        $data['pageH1'] = 'Promocodes - ' . $promocode->id;
        return $data;
    }

    public function createData(): array
    {
        $data = $this->relations();
        $data['model'] = null;
        $data['route'] = [
            'action' => route('admin.promocodes.store'),
            'method' => 'post'
        ];
        $data['pageTitle'] = 'New promocode';
        $data['pageH1'] = 'New promocode';
        return $data;
    }

    public function indexData(): array
    {
        $data['models'] = Promocode::paginate(10);
        $data['pageTitle'] = 'Promocodes';
        $data['pageH1'] = 'Promocodes';
        $data['tableAttributes'] = ['id','value','status_id', 'product_id', 'price'];
        $data['route'] = 'admin.promocodes';
        return $data;
    }
}

