@extends('layouts.master')

@section('content')
<h1 style="text-align: center;">Créer une Catégorie : </h1>
<div class="form-ctn">
    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="name">Nom :</label> <br>
            <input required type="text" name="gender" value="{{old('name')}}" id="gender" placeholder="Nom de la catégorie">
        </div>
        <button class="edit-form-btn edit" type="submit">Créer la Catégorie</button>
    </form>
</div>
@endsection