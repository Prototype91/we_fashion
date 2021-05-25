@extends('layouts.master')

@section('content')
<div class="results">
    <h1>{{$productsAmount}} résultat(s)</h1>
</div>

<div class="list-group">
    @forelse($products as $product)
    <div class="card">
        <img src="">
        <div class="container">
            <h4> <a href="{{url('product', $product->id)}}">{{$product->name}}</a></h4>
            <p>{{$product->description}}</p>
            <p>Genre : {{$product->category->gender === 'female' ? 'Femme' : 'Homme'}}</p>
            <p>{{$product->price}} €</p>
            <p>Référence : {{$product->ref}}</p>
            <p>Soldes : {{$product->discount === 0 ? 'Non' : 'Oui'}}</p>
        </div>
    </div>
    @empty
    <p style="text-align: center">Désolé aucun article à afficher...</p>
    @endforelse
</div>
@endsection