@extends('layouts.master')

@section('content')
<div class="table-ctn">
    <div>
        <h1>Bienvenue sur votre espace Admin Catégories !</h1>
        <a class="add" href="/">Ajouter une Catégorie</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Édition</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td data-label="Nom">{{$category->gender === 'female' ? 'Femme' : 'Homme'}}</td>
                <td data-label="Édition"><a class="edit" href="/">Éditer</a></td>
                <td data-label="Supprimer">
                    <form class="delete-form" method="POST" action="">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="delete" type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
            @empty
            Aucune Catégorie ...
            @endforelse
        </tbody>
    </table>
</div>
@endsection