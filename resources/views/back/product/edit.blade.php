@extends('layouts.master')

@section('content')
<div class="head">
    <h1 style="text-align: center;">Modifier l'Article : </h1>
    <h3 style="text-align: center;">Référence produit : {{$product->ref}}</h3>
</div>
<div class="form-ctn">
    <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="flex">
            <section>
                <div>
                    <label for="name">Nom :</label> <br>
                    <input class="form-control" required type="text" name="name" value="{{$product->name}}" id="name" placeholder="Nom de l'article">
                </div>
                <div>
                    <label for="price">Prix :</label> <br>
                    <input class="form-control" required type="number" min="0" max="9999" step="0.01" name="price" value="{{$product->price}}" id="price" placeholder="Prix de l'article">
                </div>
            </section>
            <section>
                <div>
                    <label for="description">Description :</label> <br>
                    <textarea class="form-control" required type="text" name="description">{{$product->description}}</textarea>
                </div>
                <div>
                    <label for="category">Catégorie :</label>
                    <select id="category" name="category_id">
                        @foreach($categories as $id => $gender)
                        <option {{ $product->category_id == $id ? 'selected' : '' }} value="{{$id}}">{{$gender}}</option>
                        @endforeach
                    </select>
                </div>
            </section>
        </div>
        <div class="flex">
            <section>
                <div>
                    <h2>Status</h2>
                    <input type="radio" name="published" value="1" @if($product->published == true) checked @endif>Publié<br>
                    <input type="radio" name="published" value="0" @if($product->published == false) checked @endif>Non-Publié<br>
                </div>
                <div>
                    <h2>Soldes</h2>
                    <input type="radio" @if($product->discount == true) checked @endif name="discount" value="1" checked>En Soldes<br>
                    <input type="radio" @if($product->discount == false) checked @endif name="discount" value="0">Non-Soldé<br>
                </div>
            </section>
            <section class="align-end">
                <div>
                    <h3>Tailles : </h3>
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
                        <input type="checkbox" id="xl" name="size[]" value="XL">
                    </fieldset>
                </div>
                <div class="picture-input-ctn">
                    <h2>Photo :</h2>
                    <input class="picture-input form-control" type="file" name="picture" id="picture"/>
                </div>
            </section>
        </div>
        <div class="btn-ctn-validate">
            <button class="edit-form-btn edit" type="submit">Modifier l'article</button>
        </div>
    </form>
</div>
@endsection