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
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Role</th>
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
                ajax: '{!! route('users.datatables') !!}',
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email'},
                    { data: 'role', name: 'role', render: function (data) {
                        switch (data) {
                            case '1' :
                                return '<span class="badge badge-success">Utilisateur</span>';
                                break;
                            case '2' :
                                return '<span class="badge badge-warning">Restaurateur</span>';
                                break;
                            default :
                                return '<span class="badge badge-danger">Administrateur</span>';
                                break;
                        }
                    }},
                    {data: null, sortable: false, searchable: false, render: function (data) {
                        return '<a href="{{ route('users.index') }}/'+data.id+'" class="btn btn-primary"><i class="fa fa-search"></i></a>'
                    }}
                ]
            })
        });
    </script>
@endsection