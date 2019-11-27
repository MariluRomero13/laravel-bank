@extends('adminlte::layouts.app')

@section('title')
	Clientes
@endsection

@section('links')
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
              <h3 class="box-title">Clientes</h3>
            </div>
            <div class="box-body">
                <a href="{{ route('clientes.create')}}" type="button" class="btn btn-primary button-style">
                        <i class="fa fa-user-plus"></i> Agregar
                </a>
                <div class="table-responsive" style="margin-top: 2%;">
                    <table id="customersTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>CURP</th>
                                <th>RFC</th>
                                <th>Acciones</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $customers as $customer )
                                <tr>
                                    <td>{{ $customer->name }} {{ $customer->first_last_name }} {{ $customer->second_last_name }}</td>
                                    <td>{{ $customer->curp }}</td>
                                    <td>{{ $customer->rfc }}</td>
                                    <td>
                                        <a class="btn btn-warning" type="button">
                                            <i class="fa fa-map-marker"></i>
                                        </a>
                                        <a class="btn btn-warning" type="button">
                                            <i class="fa fa-list"></i>
                                        </a>
                                        <a class="btn btn-warning" type="button">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
    </section>
@endsection

@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
   $(document).ready(function() {
        $('#customersTable').DataTable();

    });
</script>
@endsection
