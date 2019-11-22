@extends('adminlte::layouts.app')

@section('title')
	Usuarios
@endsection

@section('links')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('main-content')
<section class="content">
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
        <div class="box-header">
            <h3 class="box-title">Usuarios</h3>
        </div>
        <div class="box-body">
            @csrf
            <a class="btn btn-default button-style" href="{{ route('usuarios.create') }}">
                <i class="fa fa-user-plus"></i> Agregar
            </a>
            <table id="usersTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ( $users as $user )
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                <a class="btn btn-warning" type="submit" href="{{ route('usuarios.edit',$user->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                @if($user->status)
                                    <button class="btn btn-success status" type="submit" data-id="{{ $user->id }}">
                                        <i class="fa fa-check"></i>
                                    </button>
                                @else
                                    <button class="btn btn-danger status"  type="submit" data-id="{{ $user->id }}">
                                        <i class="fa fa-close"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
</section>
@endsection


@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable();
        });
    </script>
    <script>
        $(".status").click(function(){
            console.log('holaa')
            var user_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax(
            {
                url:"/users/destroy/"+user_id,
                type: "GET",
                data: {
                    "id": user_id,
                    "_token": token,
                },
                success: function (response){
                    console.log("it Works");
                    console.log(response)
                    //$('#usersTable').DataTable().ajax.reload();
                }
            });
        });
    </script>
@endsection
