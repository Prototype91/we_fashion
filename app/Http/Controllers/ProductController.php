<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProductRequest;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // Gets products with the pagination
        $products = Product::paginate(15);

        // Gets the amount of products
        $productsAmount = count($products);

        // Redirection
        return view('back.product.index', ['products' => $products, 'productsAmount' => $productsAmount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // Gets the categories
        $categories = Category::pluck('gender', 'id')->all();

        // Generates a reference for the product
        $ref = Str::random(16);

        // redirection
        return view('back.product.create', ['categories' => $categories, 'ref' => $ref]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreProductRequest $request)
    {
        // Gets the sizes from inputs
        $sizes = $request->input('size');

        // Array to push all sizes inside
        $sizesArray = array();

        // If there are sizes
        if ($sizes) {
            foreach ($sizes as $size) {
                // We push the size into the array
                $sizesArray[] = $size;
            }
            // We convert the array of sizes into a string
            $stringSizes = implode(',', $sizesArray);
        }

        // Datas that we will use to create the product
        $data = [];

        // We set the datas
        $data['size'] = $sizes ? $stringSizes : 'Aucune taille disponible';
        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');
        $data['price'] = $request->input('price');
        $data['category_id'] = $request->input('category_id');
        $data['published'] = $request->input('published');
        $data['discount'] = $request->input('discount');
        $data['ref'] = $request->input('ref');

        // We create the product
        $product = Product::create($data);

        // Gets the picture
        $image = $request->file('picture');

        // If there is a picture
        if (!empty($image)) {
            // We get the category name for the folder
            $categoryFolder = Category::find($data['category_id'])->gender;

            // We store the picture into the good folder
            $link = $image->store('/' . $categoryFolder);

            // We create the picture
            $product->picture()->create([
                'link' => $link
            ]);
        }

        // Redirection
        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(int $id)
    {
        // Gets the product to edit
        $product = Product::find($id);

        // Gets the categories
        $categories = Category::pluck('gender', 'id')->all();

        // Redirection
        return view('back.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(StoreProductRequest $request, int $id)
    {
        // Gets the product to update
        $product = Product::find($id);

        // Gets the sizes from inputs
        $sizes = $request->input('size');

        // Array to push all sizes inside
        $sizesArray = array();

        // If there are sizes
        if ($sizes) {
            foreach ($sizes as $size) {
                // We push the size into the array
                $sizesArray[] = $size;
            }

            // We convert the array of sizes into a string
            $stringSizes = implode(',', $sizesArray);
        }

        // Datas that we will use to update the product
        $data = [];

        // We set the datas
        $data['size'] = $sizes ? $stringSizes : 'Aucune taille disponible';
        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');
        $data['price'] = $request->input('price');
        $data['category_id'] = $request->input('category_id');
        $data['published'] = $request->input('published');
        $data['discount'] = $request->input('discount');

        // We update the datas of the product
        $product->update($data);

        $image = $request->file('picture');

        // If there is a picture
        if (!empty($image)) {
            // We get the category name for the folder
            $categoryFolder = Category::find($data['category_id'])->gender;
            // We store the picture into the good folder
            $link = $image->store('/' . $categoryFolder);

            // Deletion of the picture if it exists
            if ($product->picture) {
                // Deletes from database
                $product->picture()->delete();
            }
            
            // We update the picture
            $product->picture()->create([
                'link' => $link
            ]);
        }

        // Redirection
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(int $id)
    {
        // Gets the product to delete
        $product = Product::find($id);

        // Deletes the product
        $product->delete();

        // Redirection
        return redirect()->route('product.index');
    }
}
