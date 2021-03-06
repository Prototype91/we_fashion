@extends('layouts.master')

@section('content')
<div class="table-ctn">
    <div>
        <h1>Bienvenue sur votre espace Admin Catégories !</h1>
        <a class="add" href="{{route('category.create')}}">Ajouter une Catégorie</a>
    </div>
    <table>
        @if(count($categories))
        <thead>
            <tr>
                <th>Nom</th>
                <th>Édition</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        @endif
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td data-label="Nom">{{$category->gender}}</td>
                <td data-label="Édition"><a class="edit" href="{{route('category.edit', $category->id)}}">Éditer</a></td>
                <td data-label="Supprimer">
                    <form class="delete-form" method="POST" action="{{route('category.destroy', $category->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="delete" type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
            @empty
            <h2 class="empty">Aucune Catégorie à gérer ...</h2>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
@parent
<script src="{{asset('js/confirm.js')}}"></script>
@endsection