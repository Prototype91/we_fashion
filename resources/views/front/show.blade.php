@extends('layouts.master')

@section('content')
<div class="details-ctn">
    <div class="cart-ctn">
        <div class="details-img">
        @if($product->picture)
            <img src="{{asset('images/'.$product->picture->link)}}">
        @else
        <img src="https://assets.hermes.com/is/image/hermesedito/P_11_JOAILLERIE_CAVALIERE_1?fmt=webp&fit=wrap,0&wid=696">
        @endif
        </div>
        <div class="add-to-cart">
            <h2>{{$product->name}}</h2>
            <p><strong>Référence : </strong>{{$product->ref}}</p>
            @if($product->category)
            <p><strong>Catégorie : </strong>{{$product->category->gender}}</p>
            @endif
            <p>
                <strong>Prix : </strong>{{$product->price}} €
                @if($product->discount)
                <span class="new-price"> => {{round($product->price *0.5, 2)}} €</span>
                @endif
            </p>
            <form action="">
                <label for="size">Taille(s) disponible(s) :</label>
                <select id="size" name="size">
                @foreach($sizes as $id => $size)
                <option value="{{$id}}">{{$size}}</option>
                @endforeach
            </select>
                <div>
                    <button class="add" type="submit">Acheter</button>
                </div>
            </form>
        </div>
    </div>
    <div class="description">
        <p><strong>Description : </strong>{{$product->description}}</p>
    </div>
</div>

@endsection