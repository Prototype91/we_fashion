<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'gender' => 'Homme'
        ]);
        App\Category::create([
            'gender' => 'Femme'
        ]);

        factory(App\Product::class, 20)->create()->each(function ($product) {

            $category = App\Category::find(rand(1, 2));

            $product->category()->associate($category);

            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données
        });
    }
}
