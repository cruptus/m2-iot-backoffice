@extends('layouts.administration')

@section('navigation')
    <li class="breadcrumb-item ">
        <a href="{{ route('users.index') }}">Utilisateurs</a>
    </li>
    <li class="breadcrumb-item active">Modification</li>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="float-left"><i class="fa fa-table"></i> Modification d'un utilisateur</div>
        @if(!empty($user))
                    <form action="{{ route('users.delete', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="hidden" value="{{ $user->id }}" name="id">
                        <button class="btn btn-danger float-right" type="submit">Supprimer</button>
                    </form>
                @endif
        </div>
        <div class="card-body">
            <form action="{{ !empty($user) ? route('users.update', $user->id) : route('users.create') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" required value="{{ !empty($user) ? $user->name : @old('name') }}" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required value="{{ !empty($user) ? $user->email : @old('email') }}" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="role">Rôle</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1">Utilisateur</option>
                        <option value="2">Restaurateur</option>
                        <option value="3">Administrateur</option>
                    </select>
                </div>
                <div class="form-group">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour</a>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection