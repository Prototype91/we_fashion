@extends('layouts.master')

@section('content')
<div class="table-ctn">
    <div>
        <h1>Bienvenue sur votre espace Admin !</h1>
        <a class="add" href="{{route('product.create')}}">Ajouter un Article</a>
    </div>
    <table>
        @if(count($products))
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>État</th>
                <th>Édition</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        @endif
        <tbody>
            @forelse($products as $product)
            <tr>
                <td data-label="Nom"> <a href="{{url('product', $product->id)}}">{{$product->name}}</a></td>
                @if($product->gender)
                <td data-label="Catégorie">{{$product->category->gender}}</td>
                @endif
                <td data-label="Prix">
                    {{$product->price}} €
                    @if($product->discount)
                    <span class="new-price"> => {{round($product->price *0.5, 2)}} €</span>
                    @endif
                </td>
                <td data-label="État" class="published">
                    @if($product->published == true)
                    <p>Publié</p>
                    @else
                    <p>Non-publié</p>
                    @endif
                </td>
                <td data-label="Édition"><a class="edit" href="{{route('product.edit', $product->id)}}">Éditer</a></td>
                <td data-label="Supprimer">
                    <form class="delete-form" method="POST" action="{{route('product.destroy', $product->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="delete" type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
            @empty
            <h2 class="empty">Aucun article à gérer ...</h2>
            @endforelse
        </tbody>
    </table>
    <div>
        {{$products->links()}}
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="{{asset('js/confirm.js')}}"></script>
@endsection