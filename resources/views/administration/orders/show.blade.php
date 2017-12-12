@extends('layouts.administration')

@section('navigation')
    <li class="breadcrumb-item">
        <a href="{{ route('orders.index') }}">Commandes</a>
    </li>
    <li class="breadcrumb-item active">Detail</li>
@endsection
