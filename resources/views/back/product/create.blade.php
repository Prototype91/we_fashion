@extends('layouts.master')

@section('content')
<h1 style="text-align: center;">Ajouter un Article : </h1>
<div class="form-ctn">
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" value="{{$ref}}" name="ref">
        <div class="flex">
            <section>
                <div>
                    <label for="name">Nom :</label> <br>
                    <input required type="text" name="name" value="{{old('name')}}" id="name" placeholder="Nom de l'article">
                </div>
                <div>
                    <label for="price">Prix :</label> <br>
                    <input required type="number" min="0" max="99999" step="0.01" name="price" value="{{old('price')}}" id="price" placeholder="Prix de l'article">
                </div>
            </section>
            <section>
                <div>
                    <label for="description">Description :</label> <br>
                    <textarea required type="text" name="description"></textarea>
                </div>
                <div>
                    <label for="category">Catégorie :</label>
                    <select id="category" name="category_id">
                        @if(count($categories))
                        @foreach($categories as $id => $gender)
                        <option value="{{$id}}">{{$gender}}</option>
                        @endforeach
                        @else
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                        @endif
                    </select>
                </div>
            </section>
        </div>
        <div class="flex">
            <section>
                <div>
                    <h2>Status</h2>
                    <input type="radio" name="published" value="1">Publié<br>
                    <input type="radio" name="published" value="0" checked>Non-Publié<br>
                </div>
                <div>
                    <h2>Soldes</h2>
                    <input type="radio" name="discount" value="1" checked>En Soldes<br>
                    <input type="radio" name="discount" value="0">Non-Soldé<br>
                </div>
            </section>
            <section class="align-end">
                <div>
                    <label for="size">Taille :</label>
                    <fieldset>
                        <label for="xs">XS</label>
                        <input type="checkbox" id="xs" name="size[]" value="XS"> <br>
                        <label for="s">S</label>
                        <input type="checkbox" id="s" name="size[]" value="S"> <br>
                        <label for="m">M</label>
                        <input type="checkbox" id="m" name="size[]" value="M"> <br>
                        <label for="l">L</label>
                        <input type="checkbox" id="l" name="size[]" value="L"> <br>
                        <label for="xl">XL</label>
                        <input type="checkbox" id="xl" name="size[]" value="XL"> <br>
                    </fieldset>
                </div>
                <div>
                    <h2>Photo :</h2>
                    <input class="picture-input" type="file" name="picture">
                </div>
            </section>
        </div>
        <div class="btn-ctn-validate">
            <button class="edit-form-btn edit" type="submit">Ajouter l'article</button>
        </div>
    </form>
</div>
@endsection