<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\CommentStatus;
use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductStatus;
use App\Models\ProductTag;
use App\Models\Promocode;
use App\Models\PromocodeStatus;
use App\Models\Role;
use App\Models\User;
use App\Models\Version;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->makeUsersData();
        $this->makeProductsData();
        $this->makePromocodesData();
        $this->makeCommentsData();
        $this->makePaymentData();
    }

    private function makeUsersData(): void
    {
        $roles = [
            ['title' => 'admin', 'access_level' => 10],
            ['title' => 'user', 'access_level' => 1],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $admin = [
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => \Hash::make('asd123asd'),
            'role_id' => Role::where('title', '=' ,'admin')->first()->id
        ];
        User::create($admin);
        User::factory(3)->create();
    }

    private function makeProductsData(): void
    {
        $categories = [
            ['title' => 'Sandbox'],
            ['title' => 'RTS'],
            ['title' => 'Shooters'],
            ['title' => 'Multiplayer'],
            ['title' => 'RPG'],
            ['title' => 'Simulation'],
            ['title' => 'Sports'],
            ['title' => 'Puzzlers'],
            ['title' => 'Adventure'],
            ['title' => 'Open world'],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }

        $tags = [
            ['title' => 'New'],
            ['title' => 'Free'],
            ['title' => 'Popular'],
            ['title' => 'Profitable'],
        ];

        foreach ($tags as $tag) {
            ProductTag::create($tag);
        }

        $versions = [
            ['title' => 'Standard Edition'],
            ['title' => 'Deluxe Edition'],
            ['title' => 'Premium Edition'],
        ];

        foreach ($versions as $version) {
            Version::create($version);
        }

        $productStatuses = [
            ['title' => 'active'],
            ['title' => 'inactive'],
        ];

        foreach ($productStatuses as $productStatus) {
            ProductStatus::create($productStatus);
        }

        $products = [
            [
                'title' => 'Microsoft Flight Simulator (2020)',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
            [
                'title' => 'RESIDENT EVIL 7',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
            [
                'title' => 'Far Cry 6',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
            [
                'title' => 'Forza Horizon 5',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
            [
                'title' => 'Watch Dogs: Legion',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
            [
                'title' => 'Battlefield 2042',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
            [
                'title' => 'Fallout New Vegas',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
            [
                'title' => 'God of War',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
            [
                'title' => 'Days Gone',
                'description' => "Game`s description",
                'discount' => null,
                'requirements' => "CPU: Intel Core i5-4460 or AMD Ryzen 3 1200 or better
                                   RAM: 8 GB
                                   VIDEO CARD: Radeon RX 570 or GeForce GTX 770 or better
                                   DEDICATED VIDEO RAM: 2048 MB
                                   PIXEL SHADER: 5.0
                                   VERTEX SHADER: 5.0
                                   OS: Windows 10 64-bit
                                   FREE DISK SPACE: 150 GB",
                'preview' => 'images/products/cat.png',
                'images' => null,
                'version_id' => Version::get()->random()->id,
                'category_id' => ProductCategory::get()->random()->id,
                'status_id' => ProductStatus::get()->random()->id,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        Product::all()->each(function ($item) {
            $tags = ProductTag::all();
            $item->tags()->attach($tags->random(2));
        });
    }

    private function makePromocodesData(): void
    {
        $promocodesStatuses = [
            ['title' => 'reserve'],
            ['title' => 'active'],
            ['title' => 'archived'],
            ['title' => 'deleted'],
        ];

        foreach ($promocodesStatuses as $promocodeStatus) {
            PromocodeStatus::create($promocodeStatus);
        }

        $promocodes = [
            [
                'value' => \Hash::make('test1'),
                'product_id' => Product::get()->random()->id,
                'status_id' => PromocodeStatus::reserveId(),
                'price' => fake()->numberBetween(0,1000),
            ],
            [
                'value' => \Hash::make('test2'),
                'product_id' => Product::get()->random()->id,
                'status_id' => PromocodeStatus::reserveId(),
                'price' => fake()->numberBetween(0,1000),
            ],
            [
                'value' => \Hash::make('test3'),
                'product_id' => Product::get()->random()->id,
                'status_id' => PromocodeStatus::reserveId(),
                'price' => fake()->numberBetween(0,1000),
            ],
            [
                'value' => \Hash::make('test4'),
                'product_id' => Product::get()->random()->id,
                'status_id' => PromocodeStatus::reserveId(),
                'price' => fake()->numberBetween(0,1000),
            ],
            [
                'value' => \Hash::make('test5'),
                'product_id' => Product::get()->random()->id,
                'status_id' => PromocodeStatus::reserveId(),
                'price' => fake()->numberBetween(0,1000),
            ],
            [
                'value' => \Hash::make('test6'),
                'product_id' => Product::get()->random()->id,
                'status_id' => PromocodeStatus::reserveId(),
                'price' => fake()->numberBetween(0,1000),
            ],
            [
                'value' => \Hash::make('test7'),
                'product_id' => Product::get()->random()->id,
                'status_id' => PromocodeStatus::reserveId(),
                'price' => fake()->numberBetween(0,1000),
            ],
        ];


        foreach ($promocodes as $promocode) {
            Promocode::create($promocode);
        }
    }

    private function makeCommentsData(): void
    {
        $commentStatuses = [
            ['title' => 'moderation'],
            ['title' => 'published'],
            ['title' => 'rejected']
        ];

        foreach ($commentStatuses as $commentStatus) {
            CommentStatus::create($commentStatus);
        }

        $comments = [];

        for ($i = 0; $i < 10; $i++){
            $comments[] = [
                'message' => fake()->realText(),
                'user_id' => User::get()->random()->id,
                'status_id' => CommentStatus::moderationId(),
                'product_id' => Product::get()->random()->id
            ];
        }

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }

    private function makePaymentData(): void
    {
        $paymentStatuses = [
            ['title' => 'success'],
            ['title' => 'failed'],
        ];

        foreach ($paymentStatuses as $paymentStatus) {
            PaymentStatus::create($paymentStatus);
        }

        $payments = [];

        for ($i = 0; $i < 2; $i++){
            $promocode = Promocode::reserveItems()->first();
            $promocode->update(['status_id' => PromocodeStatus::archivedId()]);

            $payments[] = [
                'user_id' => User::get()->random()->id,
                'status_id' => PaymentStatus::get()->random()->id,
                'promocode_id' => $promocode->id,
            ];
        }

        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
