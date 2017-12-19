@extends('layouts.administration')

@section('navigation')
    <li class="breadcrumb-item active">My Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6 col-sm-6 mb-6">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-credit-card"></i>
                    </div>
                    <div class="mr-5">{{ $user->solde }} <i class="fa fa-euro"></i> </div>
                </div>
                <div class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Porte monnaie</span>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-6">
            <div class="card text-white o-hidden h-100" style="background-color: rebeccapurple">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-shopping-basket"></i>
                    </div>
                    <div class="mr-5">{{ $commandes }}</div>
                </div>
                <div class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Commandes</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3" style="margin-top: 16px">
        <div class="card-header">
            <i class="fa fa-credit-card-alt"></i> Recharger mon compte</div>
        <div class="card-body">
            <form action="{{ route('recharger') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="credit">Credit</label>
                    <input type="number" name="credit" id="credit" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Créditer</button>
                </div>
            </form>
        </div>
        <div class="card-footer small text-muted">Mise à jour le  {{ date('d/m/Y', time()) }}</div>
    </div>
@endsection