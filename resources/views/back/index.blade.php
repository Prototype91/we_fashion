@extends('layouts.master')

@section('content')
<div class="table-ctn">
    <div>
        <h1>Bienvenue sur votre espace Admin !</h1>
        <a class="add" href="/">Ajouter un Article</a>
    </div>
    <table>
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
        <tbody>
            @forelse($products as $product)
            <tr>
                <td data-label="Nom"> <a href="{{url('product', $product->id)}}">{{$product->name}}</a></td>
                <td data-label="Catégorie">{{$product->category->gender === 'female' ? 'Femme' : 'Homme'}}</td>
                <td data-label="Prix">{{$product->price}} €</td>
                <td data-label="État" class="published">
                    @if($product->published == true)
                    <p>Publié</p>
                    @else
                    <p>Non-publié</p>
                    @endif
                </td>
                <td data-label="Édition"><a class="edit" href="/">Éditer</a></td>
                <td data-label="Supprimer">
                    <form class="delete-form" method="POST" action="{{route('product.destroy', $product->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="delete" type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
            @empty
            Aucun Article ...
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