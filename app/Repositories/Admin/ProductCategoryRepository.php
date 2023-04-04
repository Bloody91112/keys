<?php

namespace App\Repositories\Admin;


use App\Models\ProductCategory;

class ProductCategoryRepository
{
    public function editData(ProductCategory $category): array
    {
        $data['model'] = $category;
        $data['products'] = $category->products()->orderByDesc('created_at')->get();
        $data['route'] = [
            'action' => route('admin.categories.update', $category->id),
            'method' => 'patch'
        ];
        $data['pageTitle'] = 'Categories | ' . $category->title;
        $data['pageH1'] = 'Categories - ' . $category->title;
        return $data;
    }

    public function createData(): array
    {
        $data['model'] = null;
        $data['route'] = [
            'action' => route('admin.categories.store'),
            'method' => 'post'
        ];
        $data['pageTitle'] = 'New category';
        $data['pageH1'] = 'New category';
        return $data;
    }

    public function indexData(): array
    {
        $data['models'] = ProductCategory::paginate(10);
        $data['pageTitle'] = 'Categories';
        $data['pageH1'] = 'Categories';
        $data['tableAttributes'] = ['id','title'];
        $data['route'] = 'admin.categories';
        return $data;
    }
}

