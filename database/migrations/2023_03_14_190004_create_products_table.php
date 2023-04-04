<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->unsignedSmallInteger('discount')->nullable();
            $table->jsonb('images')->nullable();
            $table->string('preview');
            $table->timestamps();

            $table->foreignId('category_id')->index()->constrained('product_categories');
            $table->foreignId('status_id')->index()->constrained('product_statuses');
            $table->foreignId('version_id')->index()->constrained('versions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
