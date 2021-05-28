<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class FrontController extends Controller
{
    // Constructor
    public function __construct()
    {
        // Injects datas to partial view
        view()->composer('partials.menu', function ($view) {
            // Gets the array of categories
            $categories = Category::pluck('gender', 'id')->all();

            // We give datas to the view
            $view->with('categories', $categories);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // Gets the products with pagination
        $products = Product::paginate(6);

        // Gets the amount of products
        $productsAmount = count($products);

        // Redirection
        return view('front.index', ['products' => $products, 'productsAmount' => $productsAmount]);
    }

    public function showProductsByCategory(int $id)
    {
        // Gets the category
        $category = Category::find($id);

        // Gets the products with pagination
        $products = $category->products()->paginate(6);

        // Gets the amount of products
        $productsAmount = count($products);

        // Redirection
        return view('front.category', ['products' => $products, 'category' => $category, 'productsAmount' => $productsAmount]);
    }

    public function showProductsByDiscount()
    {
        // Gets the products with pagination
        $products = Product::discount()->paginate(6);

        // Gets the amount of products
        $productsAmount = count($products);

        // Redirection
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
        // Gets the product to display
        $product = Product::find($id);

        // Converts the array into string
        $sizes = array_slice(explode(',', $product->size), 0);

        // dd($sizes);

        // Redirection
        return view('front.show', ['product' => $product, 'sizes' => $sizes]);
    }
}
