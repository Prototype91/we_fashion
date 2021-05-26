@extends('layouts.master')

@section('content')
<h1 style="text-align: center;">Modifier l'Article : </h1>
<h3 style="text-align: center;">Référence produit : {{$product->ref}}</h3>
<div class="form-ctn">
    <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div>
            <label for="name">Nom :</label> <br>
            <input type="text" name="name" value="{{$product->name}}" id="name" placeholder="Nom de l'article">
        </div>
        <div>
            <label for="price">Prix :</label> <br>
            <input type="number" min="0" max="99999" step="0.01" name="price" value="{{$product->price}}" id="price" placeholder="Prix de l'article">
        </div>
        <div>
            <label for="description">Description :</label> <br>
            <textarea type="text" name="description">{{$product->description}}</textarea>
        </div>
        <div>
            <label for="category">Catégorie :</label>
            <select id="category" name="category_id">
                @foreach($categories as $id => $gender)
                <option {{ $product->category_id == $id ? 'selected' : '' }} value="{{$id}}">{{$gender}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <h2>Status</h2>
            <input type="radio" name="published" value="1" @if($product->published == true) checked @endif>Publié<br>
            <input type="radio" name="published" value="0" @if($product->published == false) checked @endif>Non-Publié<br>
        </div>
        <div>
            <h2>Soldes</h2>
            <input type="radio" @if($product->discount == true) checked @endif name="discount" value="1" checked>En Soldes<br>
            <input type="radio" @if($product->discount == false) checked @endif name="discount" value="0">Non-Soldé<br>
        </div>
        <div>
            <label for="size">Taille :</label>
            <select id="size" name="size">
                <option @if($product->size == 'XS') selected @endif value="XS">XS</option>
                <option @if($product->size == 'S') selected @endif value="S">S</option>
                <option @if($product->size == 'M') selected @endif value="M">M</option>
                <option @if($product->size == 'L') selected @endif value="L">L</option>
                <option @if($product->size == 'XL') selected @endif value="XL">XL</option>
            </select>
        </div>
        <div>
            <h2>Photo :</h2>
            <input class="picture-input" type="file" name="picture">
        </div>
        <button class="edit-form-btn edit" type="submit">Modifier l'article</button>
    </form>
</div>
@endsection