<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\StorePromocodeRequest;
use App\Http\Requests\Admin\UpdatePromocodeRequest;
use App\Models\Promocode;

class PromocodeService
{
    public function store(StorePromocodeRequest $request): void
    {
        $data = $request->validated();
        Promocode::create($data);
    }

    public function update(UpdatePromocodeRequest $request, Promocode $promocode): void
    {
        $data = $request->validated();
        $promocode->update($data);
    }

    public function delete(Promocode $promocode): void
    {
        $promocode->delete();
    }
}
