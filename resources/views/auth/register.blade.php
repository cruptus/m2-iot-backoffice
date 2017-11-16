@extends('layouts.auth')

@section('content')
    <div class="card-header">Création mot de passe</div>
    <div class="card-body">
        <form id="register" method="post" action="{{ route('registerPost') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $user->token }}" />
            <div class="form-group">
                <label for="password" class="control-label">Mot de passe</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="control-label">Confirmer mot de passe</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Créer</button>
            </div>
        </form>
    </div>
@endsection
