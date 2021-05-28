@extends('layouts.master')

@section('content')
<div class="results">
    {{$products->links()}}
    <h1>{{$productsAmount}} résultat(s)</h1>
</div>
<div class="category">
    <h2>Article(s) pour {{$category->gender}} :</h2>
</div>
<div class="list-group">
    @forelse($products as $product)
    <a href="{{url('product', $product->id)}}" class="card">
        <div class="img-ctn">
            @if($product->picture->link)
            <img src="{{asset('images/'.$product->picture->link)}}">
            @else
            <img src="https://assets.hermes.com/is/image/hermesedito/P_11_JOAILLERIE_CAVALIERE_1?fmt=webp&fit=wrap,0&wid=696">
            @endif
        </div>
        <div class="container">
            <h4>{{$product->name}}</h4>
            <p>
                <strong>Prix : </strong>{{$product->price}} €
                @if($product->discount)
                <span class="new-price"> => {{round($product->price *0.5, 2)}} €</span>
                @endif
            </p>
        </div>
    </a>
    @empty
    <h2 class="empty width">Désolé, aucun article à afficher...</h2>
    @endforelse
</div>
@endsection