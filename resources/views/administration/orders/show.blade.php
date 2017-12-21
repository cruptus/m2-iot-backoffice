@extends('layouts.administration')

@section('navigation')
    <li class="breadcrumb-item">
        <a href="{{ route('orders.index') }}">Commandes</a>
    </li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="float-left"><i class="fa fa-table"></i> Visualisation de la commande N° {{ $order->id }}</div>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->titre }}</td>
                        <td>{{ $product->prix }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-right">Total</td>
                        <td>{{ $order->total }}</td>
                    </tr>
                </tfoot>


            </table>
        </div>
    </div>
@endsection