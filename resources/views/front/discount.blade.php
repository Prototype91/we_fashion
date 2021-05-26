@extends('layouts.master')

@section('content')
<div class="results">
    {{$products->links()}}
    <h1>{{$productsAmount}} résultat(s)</h1>
</div>
<div class="discount">
    <h2>Article(s) Soldé(s) :</h2>
</div>
<div class="list-group">
    @forelse($products as $product)
    <div class="card">
        <div class="img-ctn">
            <img src="https://content.asos-media.com/-/media/images/articles/men/2019/02/22-fri/how-asos-does-new-season-denim/mw-asos-style-feed-staff-style-denim-01.jpg?h=1100&w=870&la=fr-FR&hash=7B8220F6CF8523ADAC864F06AF84411B">
        </div>
        <div class="container">
            <h4> <a href="{{url('product', $product->id)}}">{{$product->name}}</a></h4>
            <p>Description : {{$product->description}}</p>
            <p>Genre : {{$product->category->gender}}</p>
            <p>Prix : {{$product->price}} €</p>
            <p>Référence : {{$product->ref}}</p>
            <p>Soldes : {{$product->discount === 0 ? 'Non' : 'Oui'}}</p>
        </div>
    </div>
    @empty
    <p class="empty">Désolé, aucun article à afficher...</p>
    @endforelse
</div>
@endsection