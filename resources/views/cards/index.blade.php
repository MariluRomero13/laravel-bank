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
            <h3 class="box-title">Tarjetas</h3>
        </div>
        <div class="box-body">
            @csrf
            <a class="btn btn-default button-style" href="{{ route('tarjetas.create') }}">
                <i class="fa fa-plus"></i> Agregar
            </a>
            <table id="cardsTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Tarjeta</th>
                        <th>Tipo</th>
                        <th>Fecha de expiración</th>
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
        var cardsTable = $('#cardsTable').DataTable({
            serverSide: true,
            ajax: "{{ route('tarjetas.index') }}",
            columns: [
                {data: 'customer'},
                {data: 'card'},
                {data: 'card_type'},
                {data: 'expiration_date'},
                {data: 'status'}
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
            var card_id = $(this).data("id");
            var value = $(this).data("target");
            var token = $("meta[name='csrf-token']").attr("content");
            swal({
                title: "¿Estás seguro?",
                text: value? 'La tarjeta se desactivará': 'La tarjeta se activará',
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
                        url:"/delete-cards/"+card_id,
                        type: "GET",
                        data: {
                            "id": card_id,
                            "_token": token,
                        },
                        success: function (response){
                            alert("hola");
                            /*var content = "";
                            if(response.status) {
                                content ="La tarjeta se activó correctamente";
                            }
                            else {
                                content ="La tarjeta se desactivó correctamente";
                            }
                            swal(content, {
                                icon: "success",
                            });
                            cardsTable.draw();*/
                        }
                    });
                }
            });
        });
    </script>
    
@endsection
