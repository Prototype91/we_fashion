@extends('layouts.master')

@section('content')
<div class="details-ctn">
    <div class="cart-ctn">
        <div class="details-img">
            <img src="https://content.asos-media.com/-/media/images/articles/men/2019/02/22-fri/how-asos-does-new-season-denim/mw-asos-style-feed-staff-style-denim-01.jpg?h=1100&w=870&la=fr-FR&hash=7B8220F6CF8523ADAC864F06AF84411B">
        </div>
        <div class="add-to-cart">
            <h2>{{$product->name}}</h2>
            <p>Référence : {{$product->ref}}</p>
            <p>Prix TTC : {{$product->price}} €</p>
            <p>Taille(s) disponibles(s) : {{$product->size}}</p>
            <p>Genre : {{$product->category->gender}}</p>
            <form action="">
                <label for="cart">Ajouter :</label>
                <select id="cart">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <div>
                    <button type="submit">Acheter</button>
                </div>
            </form>
        </div>
    </div>
    <div class="description">
        <p>Description : {{$product->description}}</p>
    </div>
</div>

@endsection