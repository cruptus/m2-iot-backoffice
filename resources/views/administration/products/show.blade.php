@extends('layouts.administration')

@section('navigation')
    <li class="breadcrumb-item ">
        <a href="{{ route('products.index') }}">Produits</a>
    </li>
    <li class="breadcrumb-item active">Modification</li>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="float-left"><i class="fa fa-table"></i> Modification d'un produit</div>
        @if(!empty($product))
                    <form action="{{ route('products.delete', $product->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <button class="btn btn-danger float-right" type="submit">Supprimer</button>
                    </form>
                @endif
        </div>
        <div class="card-body">
            <form action="{{ !empty($product) ? route('products.update', $product->id) : route('products.create') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" required value="{{ !empty($product) ? $product->titre : @old('titre') }}" class="form-control" />
                    @if ($errors->has('titre'))
                        <label class="error" for="me_active">{{ $errors->first('titre') }}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="number" id="prix" name="prix" required value="{{ !empty($product) ? $product->prix : @old('prix') }}" class="form-control" />
                    @if ($errors->has('prix'))
                        <label class="error" for="prix">{{ $errors->first('prix') }}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label for="is_plat">Catégorie</label>
                    <select name="is_plat" id="is_plat" class="form-control">
                        <option value="1">Plat</option>
                        <option value="0">Boisson</option>
                    </select>
                    @if ($errors->has('is_plat'))
                        <label class="error" for="is_plat">{{ $errors->first('is_plat') }}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required class="form-control">{{ !empty($product) ? $product->description : @old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <label class="error" for="description">{{ $errors->first('description') }}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">jpeg / png / bmp/ gif / svg</small>
                </div>
                @if(!empty($product) && !empty($product->image))
                    <img src="{{ $product->image }}" alt="image" style="max-height: 200%" />
                @endif
                <div class="form-group">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Retour</a>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection