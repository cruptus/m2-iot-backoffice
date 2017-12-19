@extends('layouts.administration')

@section('navigation')
    <li class="breadcrumb-item active">My Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">26 </div>
                </div>
                <div class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Utilisateurs</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-cutlery"></i>
                    </div>
                    <div class="mr-5">11</div>
                </div>
                <div class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Restaurateurs</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-credit-card"></i>
                    </div>
                    <div class="mr-5">123 <i class="fa fa-euro"></i> </div>
                </div>
                <div class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Chiffre d'affaire</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: rebeccapurple">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-shopping-basket"></i>
                    </div>
                    <div class="mr-5">13</div>
                </div>
                <div class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Commandes</span>
                </div>
            </div>
        </div>
    </div>
@endsection
