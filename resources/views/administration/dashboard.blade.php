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
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-support"></i>
                    </div>
                    <div class="mr-5">13 New Tickets!</div>
                </div>
                <div class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Incidents</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-area-chart"></i> Area Chart Example</div>
        <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

@endsection
