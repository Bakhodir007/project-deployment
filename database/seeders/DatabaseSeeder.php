<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Category\Models\Category;
use Modules\Category\Models\CategorySpecification;
use Modules\Product\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'test@example.com',
             'password' => \Hash::make('password'),
         ]);

         $paintingsCategory = Category::create(['name' => 'Paintings']);
         $drawingCategory = Category::create(['name' => 'Drawings']);
         $imagesCategory = Category::create(['name' => 'Photographic images']);
         $sculpturesCategory = Category::create(['name' => 'Sculptures']);
         $carvingsCategory = Category::create(['name' => 'Carvings']);

        CategorySpecification::create(['name' => 'Material', 'category_id' => $drawingCategory->id]);
        CategorySpecification::create(['name' => 'Whether the item', 'category_id' => $drawingCategory->id]);
        CategorySpecification::create(['name' => 'Height', 'category_id' => $drawingCategory->id]);
        CategorySpecification::create(['name' => 'Length', 'category_id' => $drawingCategory->id]);

        CategorySpecification::create(['name' => 'Image Type', 'category_id' => $imagesCategory->id]);
        CategorySpecification::create(['name' => 'Height', 'category_id' => $imagesCategory->id]);
        CategorySpecification::create(['name' => 'Length', 'category_id' => $imagesCategory->id]);

        CategorySpecification::create(['name' => 'Material', 'category_id' => $sculpturesCategory->id]);
        CategorySpecification::create(['name' => 'Height', 'category_id' => $sculpturesCategory->id]);
        CategorySpecification::create(['name' => 'Length', 'category_id' => $sculpturesCategory->id]);
        CategorySpecification::create(['name' => 'Weight (kg)', 'category_id' => $sculpturesCategory->id]);

        CategorySpecification::create(['name' => 'Material', 'category_id' => $carvingsCategory->id]);
        CategorySpecification::create(['name' => 'Height', 'category_id' => $carvingsCategory->id]);
        CategorySpecification::create(['name' => 'Length', 'category_id' => $carvingsCategory->id]);
        CategorySpecification::create(['name' => 'Weight (kg)', 'category_id' => $carvingsCategory->id]);

        $sp1 = CategorySpecification::create(['name' => 'Material', 'category_id' => $paintingsCategory->id]);
        $sp2 = CategorySpecification::create(['name' => 'Whether the item', 'category_id' => $paintingsCategory->id]);
        $sp3 = CategorySpecification::create(['name' => 'Height', 'category_id' => $paintingsCategory->id]);
        $sp4 = CategorySpecification::create(['name' => 'Length', 'category_id' => $paintingsCategory->id]);

        $product = Product::create([
            'name' => 'Paris Interior with Still Life',
            'category_id' => $paintingsCategory->id,
            'price' => 10000,
            'code' => 123456,
            'made_at' => '1880-11-01',
            'author_name' => 'Bertha Wegmann',
            'image' => 'assets/img/lots/lot.jpg',
            'status' => 'active',
            'lot_expire_at' => now()->addDays(5),
            'description' => 'Fortegnelse over Arbejder af Bertha Wegmann, Den Frie Udstillings Bygning, exhibition catalogue, 2nd edition, Copenhagen 1911, p. 2 (probably no. 26).'
        ]);

        $product->categorySpecifications()->create([
            'category_specification_id' => $sp1->id,
            'value' => 'Oil on canvas',
        ]);

        $product->categorySpecifications()->create([
            'category_specification_id' => $sp2->id,
            'value' => 'Yes',
        ]);

        $product->categorySpecifications()->create([
            'category_specification_id' => $sp3->id,
            'value' => '61.9 cm',
        ]);

        $product->categorySpecifications()->create([
            'category_specification_id' => $sp4->id,
            'value' => '75 cm',
        ]);

    }
}
