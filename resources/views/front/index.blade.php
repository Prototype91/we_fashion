@extends('layouts.master')

@section('content')
<div style="width: 80%; margin: 0 auto; text-align: center">
    <h1>Les derniers articles :</h1>
</div>
<ul class="list-group">
    @forelse($products as $product)
    <li class="list-group-item" style="padding: 20px; width: 80%; margin: 0 auto; margin-bottom: 20px;">
        <div style="display:flex;">
            <div>
                {{$product->name}}
            </div>
        </div>
    </li>
    @empty
    <li style="text-align: center">Désolé aucun article à afficher...</li>
    @endforelse
</ul>
@endsection