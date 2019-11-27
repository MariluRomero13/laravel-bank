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
            @csrf
            <a class="btn btn-default button-style" href="{{ route('creditos.create') }}">
                <i class="fa fa-plus"></i> Agregar
            </a>
            <table id="creditsTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Institución</th>
                        <th>Crédito</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                        <th>Comportamiento</th>
                        <th>Estado</th>
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
        var creditsTable = $('#creditsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('creditos.index') }}",
            columns: [
                {data: 'customer', name: 'cu.name'},
                {data: 'place', name: 'p.name'},
                {data: 'credit_type', name: 'c.credit_type'},
                {data: 'description', name: 'c.description'},
                {data: 'action'},
                {data: 'behavior', name: 'c.behavior'},
                {data: 'status', name: 'c.status'}
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
    <script>
        $('body').on('click', '.delete', function (){
            var credit_id = $(this).data("id");
            var value = $(this).data("target");
            var token = $("meta[name='csrf-token']").attr("content");
            swal({
                title: "¿Estás seguro?",
                text: value? 'El crédito se desactivará': 'El crédito se activará',
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        visible: true,
                        className: "swal-button--danger",
                        classModal: true
                    },
                    confirm: {
                        text: "Si",
                        value: true,
                        visible: true,
                        className: "swal-button--confirm",
                        closeModal: true
                    }
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax(
                    {
                        url:"/creditos-destroy/"+credit_id,
                        type: "GET",
                        data: {
                            "id": credit_id,
                            "_token": token,
                        },
                        success: function (response){
                            var content = "";
                            if(response.status) {
                                content ="El crédito se activó correctamente";
                            }
                            else {
                                content ="El crédito se desactivó correctamente";
                            }
                            swal(content, {
                                icon: "success",
                            });
                            creditsTable.draw();
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $('body').on('click', '.behavior', function (){
            var credit_id = $(this).data("id");
            var value = $(this).data("target");
            var token = $("meta[name='csrf-token']").attr("content");
            swal({
                title: "¿Estás seguro?",
                text: 'El comportamiento del crédito cambiará',
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        visible: true,
                        className: "swal-button--danger",
                        classModal: true
                    },
                    confirm: {
                        text: "Si",
                        value: true,
                        visible: true,
                        className: "swal-button--confirm",
                        closeModal: true
                    }
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax(
                    {
                        url:"/creditos-behavior/"+credit_id,
                        type: "GET",
                        data: {
                            "id": credit_id,
                            "_token": token,
                        },
                        success: function (response){
                            if(response.status) {
                                swal("Comportamiento cambiado correctamente", {
                                    icon: "success",
                                });
                                creditsTable.draw();
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
