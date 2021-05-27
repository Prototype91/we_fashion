<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class FrontController extends Controller
{
    public function __construct()
    {
        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function ($view) {
            $categories = Category::pluck('gender', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories); // on passe les données à la vue
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::paginate(6);

        $productsAmount = count($products);

        return view('front.index', ['products' => $products, 'productsAmount' => $productsAmount]);
    }

    public function showProductsByCategory(int $id)
    {
        $category = Category::find($id);

        $products = $category->products()->paginate(6);

        $productsAmount = count($products);

        return view('front.category', ['products' => $products, 'category' => $category, 'productsAmount' => $productsAmount]);
    }

    public function showProductsByDiscount()
    {

        $products = Product::discount()->paginate(6);

        $productsAmount = count($products);

        return view('front.discount', ['products' => $products, 'productsAmount' => $productsAmount]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(int $id)
    {
        $product = Product::find($id);

        $sizes = array_slice(explode(',', $product->size), 0);

        return view('front.show', ['product' => $product, 'sizes' => $sizes]);
    }
}
