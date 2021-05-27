@extends('layouts.master')

@section('content')
<h1 style="text-align: center;">Modifier la Catégorie : </h1>
<div class="form-ctn edit-category">
    <form action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div>
            <label for="name">Nom :</label> <br>
            <input required type="text" name="gender" value="{{$category->gender}}" id="gender" placeholder="Nom de la catégorie">
        </div>
        <button class="edit-form-btn edit" type="submit">Modifier la Catégorie</button>
    </form>
</div>
@endsection