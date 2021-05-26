@extends('layouts.master')

@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Modifier l'Article : </h1>
        <h3>Référence produit : {{$product->ref}}</h3>
        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div>
                <div>
                    <label for="name">Nom :</label> <br>
                    <input type="text" name="name" value="{{$product->name}}" id="name" placeholder="Nom de l'article">
                    @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span>@endif
                </div>
                <div>
                    <label for="price">Prix :</label> <br>
                    <input type="text" name="price" value="{{$product->price}}" id="price" placeholder="Prix de l'article">
                    @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                </div>
                <div>
                    <label for="description">Description :</label> <br>
                    <textarea type="text" name="description">{{$product->description}}</textarea>
                    @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                </div>
            </div>
    </div>
    <div>
        <div>
            <h2>Catégorie</h2>
            <input type="radio" @if($product->category->gender == 'female') checked @endif name="categorie" value="female" checked>Femme<br>
            <input type="radio" @if($product->category->gender == 'male') checked @endif name="categorie" value="male"> Homme<br>
        </div>
        <div>
            <h2>Status</h2>
            <input type="radio" @if($product->published == true) checked @endif name="status" value="true" checked> Publié<br>
            <input type="radio" @if($product->published == false) checked @endif name="status" value="false"> Non-Publié<br>
        </div>
        <div>
            <h2>Soldes</h2>
            <input type="radio" @if($product->discount == true) checked @endif name="discount" value="true" checked> En Soldes<br>
            <input type="radio" @if($product->discount == false) checked @endif name="discount" value="false"> Non-Soldé<br>
        </div>
        <div>
            <label for="size">Taille :</label>
            <select id="size">
                <option @if($product->size == 'XS') selected @endif value="XS">XS</option>
                <option @if($product->size == 'S') selected @endif value="S">S</option>
                <option @if($product->size == 'M') selected @endif value="M">M</option>
                <option @if($product->size == 'L') selected @endif value="L">L</option>
                <option @if($product->size == 'XL') selected @endif value="XL">XL</option>
            </select>
        </div>
    </div> <br>
    <button class="btn btn-primary" type="submit">Modifier l'article</button>
    </form>
</div>
@endsection