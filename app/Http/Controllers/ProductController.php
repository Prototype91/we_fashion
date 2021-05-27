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
        $products = Product::paginate(15);

        $productsAmount = count($products);

        return view('back.product.index', ['products' => $products, 'productsAmount' => $productsAmount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('gender', 'id')->all();

        $ref = Str::random(16);

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
        $sizes = $request->input('size');

        $sizesArray = array();

        if ($sizes) {
            foreach ($sizes as $size) {
                $sizesArray[] = $size;
            }

            $stringSizes = implode(',', $sizesArray);
        }

        $data = [];

        $data['size'] = $sizes ? $stringSizes : 'Aucune taille disponible';
        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');
        $data['price'] = $request->input('price');
        $data['category_id'] = $request->input('category_id');
        $data['published'] = $request->input('published');
        $data['discount'] = $request->input('discount');
        $data['ref'] = $request->input('ref');

        $product = Product::create($data);

        $image = $request->file('picture');

        if (!empty($image)) {
            $categoryFolder = Category::find($data['category_id'])->gender;
            $link = $image->store('/'.$categoryFolder);
            $product->picture()->create([
                'link' => $link,
                'product_id' => $request->title_image ?? $request->title
            ]);
        }

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
        $product = Product::find($id);

        $categories = Category::pluck('gender', 'id')->all();

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
        $product = Product::find($id);

        $sizes = $request->input('size');

        $sizesArray = array();

        if ($sizes) {
            foreach ($sizes as $size) {
                $sizesArray[] = $size;
            }

            $stringSizes = implode(',', $sizesArray);
        }

        $data = [];

        $data['size'] = $sizes ? $stringSizes : 'Aucune taille disponible';
        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');
        $data['price'] = $request->input('price');
        $data['category_id'] = $request->input('category_id');
        $data['published'] = $request->input('published');
        $data['discount'] = $request->input('discount');

        $product->update($data);

        $image = $request->file('picture');

        if (!empty($image)) {

            $categoryFolder = Category::find($data['category_id'])->gender;
            $link = $image->store('/'.$categoryFolder);

            // suppression de l'image si elle existe 
            if ($product->picture) {
                Storage::disk('local')->delete($product->picture->link); // supprimer physiquement l'image
                $product->picture()->delete(); // supprimer l'information en base de données
            }

            $product->picture()->create([
                'link' => $link,
                'product_id' => $request->title_image ?? $request->title
            ]);
        }

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
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index');
    }
}
