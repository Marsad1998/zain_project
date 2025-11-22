<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Brand;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'discount_price' => $this->faker->randomFloat(2, 5, 500),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'sku' => $this->faker->unique()->word,
            'is_active' => $this->faker->boolean,
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
            'weight' => $this->faker->randomFloat(2, 0.1, 10),
            'height' => $this->faker->randomFloat(2, 1, 100),
            'width' => $this->faker->randomFloat(2, 1, 100),
            'depth' => $this->faker->randomFloat(2, 1, 100),
            'is_featured' => $this->faker->boolean,
            'is_on_sale' => $this->faker->boolean,
            'barcode' => $this->faker->unique()->ean13,
            'manufacturer' => $this->faker->company,
            'warranty_period' => $this->faker->word,
            'additional_info' => $this->faker->text,
            // 'custom_attributes' => $this->faker->optional()->json(),
            'seo_title' => $this->faker->sentence,
            'seo_description' => $this->faker->paragraph,
            'seo_keywords' => $this->faker->words(3, true),
            'available_from' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'available_to' => $this->faker->dateTimeBetween('+1 year', '+2 years'),
        ];
    }
}
