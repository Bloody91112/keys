<?php

namespace App\Repositories\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductStatus;
use App\Models\ProductTag;
use App\Models\Version;

class ProductRepository
{
    private function relations(): array
    {
        $categories = ProductCategory::all();
        $tags = ProductTag::all();
        $statuses = ProductStatus::all();
        $versions = Version::all();
        return compact('categories', 'tags', 'statuses', 'versions');
    }

    public function editData(Product $product): array
    {
        $data = $this->relations();
        $data['model'] = $product;
        $data['comments'] = $product->comments()->orderByDesc('created_at')->take(3)->get();
        $data['favorites'] = $product->favorites()->orderByDesc('created_at')->take(10)->get();
        $data['promocodes'] = $product->promocodes()->orderByDesc('created_at')->take(10)->get();
        $data['route'] = [
            'action' => route('admin.products.update', $product->id),
            'method' => 'patch'
        ];
        $data['pageTitle'] = 'Products | ' . $product->title;
        $data['pageH1'] = 'Product - ' . $product->title;
        return $data;
    }

    public function createData(): array
    {
        $data = $this->relations();
        $data['model'] = null;
        $data['route'] = [
            'action' => route('admin.products.store'),
            'method' => 'post'
        ];
        $data['pageTitle'] = 'New product';
        $data['pageH1'] = 'New product';
        return $data;
    }

    public function indexData(): array
    {
        $data['models'] = Product::paginate(10);
        $data['pageTitle'] = 'Products';
        $data['pageH1'] = 'Products';
        $data['tableAttributes'] = ['id','preview', 'title', 'status_id', 'category_id'];
        $data['route'] = 'admin.products';
        return $data;
    }
}

