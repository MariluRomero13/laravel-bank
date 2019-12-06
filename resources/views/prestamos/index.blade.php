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
            <h3 class="box-title">Préstamos</h3>
        </div>
        <div class="box-body">
            @csrf
            <a class="btn btn-default button-style" href="{{ route('prestamos.create') }}">
                <i class="fa fa-plus"></i> Agregar
            </a>
            <table id="loansTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Institución</th>
                        <th>Años a pagar</th>
                        <th>Tipo de pago</th>
                        <th>Interés</th>
                        <th>Total del préstamo</th>
                        <th>Total a pagar</th>
                        <th>Fecha de registro</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
            </table>
        </div>
        </div>
</section>
@endsection


@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script>
        var loansTable = $('#loansTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('prestamos.index') }}",
            columns: [
                {data: 'customer', name: 'cu.name'},
                {data: 'place', name: 'p.name'},
                {data: 'years_to_pay', name: 'l.years_to_pay'},
                {data: 'payment_type', name: 'l.payment_type'},
                {data: 'interest_rate', name: 'l.interest_rate'},
                {data: 'loan_amount', name: 'l.loan_amount'},
                {data: 'total_amount_to_pay', name: 'l.total_amount_to_pay'},
                {data: 'loan_date', name: 'l.loan_date'},
                {data: 'detalles'}
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
