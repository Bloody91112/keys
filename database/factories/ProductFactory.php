<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\ProductStatus;
use App\Models\Version;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->realText(30);

        return [
            'title' => $title,
            'slug' => $title,
            'description' => fake()->realTextBetween(100, 250),
            'discount' => null,
            'requirements' => fake()->realTextBetween(100, 250),
            'preview' => 'images/products/cat.png',
            'images' => null,
            'version_id' => Version::get()->random()->id,
            'category_id' => ProductCategory::get()->random()->id,
            'status_id' => ProductStatus::get()->random()->id,
        ];
    }
}
