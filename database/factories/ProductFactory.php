<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Category\Models\Category;
use Modules\Product\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'code' => $this->faker->randomNumber(),
            'author_name' => $this->faker->name(),
            'made_at' => Carbon::now(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(),
            'status' => $this->faker->word(),
            'lot_expire_at' => Carbon::now(),
            'image' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => Category::factory(),
        ];
    }
}
