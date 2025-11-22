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

            // Basic Info
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // Pricing
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();

            // Inventory
            $table->integer('stock_quantity')->default(0);
            $table->string('sku')->unique();
            $table->boolean('is_active')->default(true);

            // Categorization
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');

            // Dimensions / Weight
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('depth', 8, 2)->nullable();

            // Tracking & Flags
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_on_sale')->default(false);

            // Extra Info
            $table->string('barcode')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('warranty_period')->nullable();
            $table->text('additional_info')->nullable();
            $table->json('custom_attributes')->nullable();

            // SEO
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();

            // Time windows
            $table->dateTime('available_from')->nullable();
            $table->dateTime('available_to')->nullable();

            $table->timestamps();
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
