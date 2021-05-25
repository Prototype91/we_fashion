@extends('layouts.master')

@section('content')
<div class="results">
    <h1>20 résultat(s)</h1>
</div>
<ul class="list-group">
    @forelse($products as $product)
    <li class="list-group-item">
        <div class="card">
            <img src="">
            <div class="container">
                <h4>{{$product->name}}</h4>
                <p>{{$product->description}}</p>
                <p>{{$product->price}} €</p>
                <p>Référence : {{$product->ref}}</p>
                <p>Soldes : {{$product->discount === 0 ? 'Non' : 'Oui'}}</p>
            </div>
        </div>
    </li>
    @empty
    <li style="text-align: center">Désolé aucun article à afficher...</li>
    @endforelse
</ul>
@endsection