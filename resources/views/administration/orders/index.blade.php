@extends('layouts.administration')

@section('navigation')
    <li class="breadcrumb-item active">Commandes</li>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Toutes les commandes</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Montant</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#dataTable").DataTable({
                language: {
                    url: '/js/dataTable.json'
                },
                processing: true,
                serverSide: true,
                ajax: '{!! route('orders.datatables') !!}',
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'total', name: 'total'},
                    {data: null, sortable: false, searchable: false, render: function (data) {
                        return '<a href="{{ route('orders.index') }}/'+data.id+'" class="btn btn-primary"><i class="fa fa-search"></i></a>'
                    }}
                ]
            })
        });
    </script>
@endsection