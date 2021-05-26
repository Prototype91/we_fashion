@extends('layouts.master')

@section('content')
<div class="results">
    {{$products->links()}}
    <h1>{{$productsAmount}} résultat(s)</h1>
</div>

<div class="all">
    <h2>Tous les Article(s) :</h2>
</div>
<div class="list-group">
    @forelse($products as $product)
    <div class="card">
        <div class="img-ctn">
            <img src="https://content.asos-media.com/-/media/images/articles/men/2019/02/22-fri/how-asos-does-new-season-denim/mw-asos-style-feed-staff-style-denim-01.jpg?h=1100&w=870&la=fr-FR&hash=7B8220F6CF8523ADAC864F06AF84411B">
        </div>
        <div class="container">
            <h4><a href="{{url('product', $product->id)}}">{{$product->name}}</a></h4>
            <p><strong>Description : </strong>{{$product->description}}</p>
            <p><strong>Catégorie : </strong>{{$product->category->gender}}</p>
            <p>
                <strong>Prix : </strong>{{$product->price}} €
                @if($product->discount)
                <span class="new-price"> => {{round($product->price *0.5, 2)}} €</span>
                @endif
            </p>
            <p><strong>Référence : </strong>{{$product->ref}}</p>
        </div>
    </div>
    @empty
    <h2 class="empty width">Désolé, aucun article à afficher...</p>
        @endforelse
</div>
@endsection