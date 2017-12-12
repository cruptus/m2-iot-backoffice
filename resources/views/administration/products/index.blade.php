@extends('layouts.administration')

@section('navigation')
    <li class="breadcrumb-item active">Utilisateurs</li>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Tous les utilisateurs</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Prix</th>
                        <th>Categorie</th>
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
                ajax: '{!! route('products.datatables') !!}',
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'titre', name: 'titre' },
                    { data: 'prix', name: 'prix'},
                    { data: 'is_plat', name: 'is_plat', render: function (data) {
                        if (data == true) {
                            return 'Plat';
                        } else {
                            return 'Boisson';
                        }
                    }},
                    {data: null, sortable: false, searchable: false, render: function (data) {
                        return '<a href="{{ route('products.index') }}/'+data.id+'" class="btn btn-primary"><i class="fa fa-search"></i></a>'
                    }}
                ]
            })
        });
    </script>
@endsection