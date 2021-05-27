<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creation of Categories
        App\Category::create([
            'gender' => 'Homme'
        ]);
        App\Category::create([
            'gender' => 'Femme'
        ]);
        
        // Creation of products
        factory(App\Product::class, 20)->create()->each(function ($product) {

            $category = App\Category::find(rand(1, 2));

            $product->category()->associate($category);

            $files = Storage::allFiles($category->gender == "Homme" ? "Homme" : "Femme");

            $fileIndex = array_rand($files);
            $file = $files[$fileIndex];

            $product->picture()->create([
                'link' => $file
            ]);

            $product->save();
        });
    }
}
