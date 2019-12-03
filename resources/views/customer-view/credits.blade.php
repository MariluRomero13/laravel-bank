@extends('adminlte::layouts.app')

@section('title')
	Créditos
@endsection

@section('links')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
@endsection

@section('main-content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Créditos</h3>
            </div>
            <div class="box-body">

                <div class="table-responsive" style="margin-top: 2%;">
                    <table id="creditsTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Institución</th>
                                <th>Tipo</th>
                                <th>descripción</th>
                                <th>Behavior</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
          </div>
    </section>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script>
        $('#creditsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('instituciones.index') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action'}
            ],
            language: {
                "info": "_TOTAL_ registros",
                "search": "Buscar",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
                "lengthMenu": 'Mostrar <select>'+
                                '<option value="5">5</option>'+
                                '<option value="10">10</option>'+
                                '<option value="20">20</option>'+
                                '<option value="-1">Todos</option>'+
                                '</select> registros',
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "processing": "Procesando...",
                "emptyTable": "No hay datos...",
                "zeroRecords": "No hay coincidencias"
            }
        });
    </script>
@endsection
