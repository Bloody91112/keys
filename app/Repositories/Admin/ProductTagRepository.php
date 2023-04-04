<?php

namespace App\Repositories\Admin;

use App\Models\ProductTag;

class ProductTagRepository
{
    public function editData(ProductTag $tag): array
    {
        $data['model'] = $tag;
        $data['products'] = $tag->products()->orderByDesc('created_at')->get();
        $data['route'] = [
            'action' => route('admin.tags.update', $tag->id),
            'method' => 'patch'
        ];
        $data['pageTitle'] = 'Tags | ' . $tag->title;
        $data['pageH1'] = 'Tags - ' . $tag->title;
        return $data;
    }

    public function createData(): array
    {
        $data['model'] = null;
        $data['route'] = [
            'action' => route('admin.tags.store'),
            'method' => 'post'
        ];
        $data['pageTitle'] = 'New tag';
        $data['pageH1'] = 'New tag';
        return $data;
    }

    public function indexData(): array
    {
        $data['models'] = ProductTag::paginate(10);
        $data['pageTitle'] = 'Tags';
        $data['pageH1'] = 'Tags';
        $data['tableAttributes'] = ['id','title'];
        $data['route'] = 'admin.tags';
        return $data;
    }
}

