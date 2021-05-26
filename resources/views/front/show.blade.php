@extends('layouts.master')

@section('content')
<div class="details-ctn">
    <div class="cart-ctn">
        <div class="details-img">
            <img src="https://content.asos-media.com/-/media/images/articles/men/2019/02/22-fri/how-asos-does-new-season-denim/mw-asos-style-feed-staff-style-denim-01.jpg?h=1100&w=870&la=fr-FR&hash=7B8220F6CF8523ADAC864F06AF84411B">
        </div>
        <div class="add-to-cart">
            <h2>{{$product->name}}</h2>
            <p><strong>Référence : </strong>{{$product->ref}}</p>
            <p><strong>Catégorie : </strong>{{$product->category->gender}}</p>
            <p>
                <strong>Prix : </strong>{{$product->price}} €
                @if($product->discount)
                <span class="new-price"> => {{round($product->price *0.5, 2)}} €</span>
                @endif
            </p>
            <form action="">
                <label for="size">Taille :</label>
                <select id="size">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
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