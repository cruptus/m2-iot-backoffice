@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-blue">
                <div class="panel-body">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            100
                        </div>
                        <div>Nombre d'etudiants</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-green">
                <div class="panel-body">
                    <div class="col-xs-3">
                        <i class="fa fa-cutlery fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            100
                        </div>
                        <div>Nombre de restaurateurs</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-yellow">
                {{--<div class="panel-heading">--}}
                    {{--<h4>Chiffre d'affaire</h4>--}}
                {{--</div>--}}
                <div class="panel-body">
                    <div class="col-xs-3">
                            <i class="fa fa-credit-card fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            100
                        </div>
                        <div>Chiffre d'affaire</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
