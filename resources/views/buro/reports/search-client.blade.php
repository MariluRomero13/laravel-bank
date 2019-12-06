@extends('adminlte::layouts.app')

@section('title')
	Créditos
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
            <form action="#" method="GET">
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Buscar cliente por:</h3>
                        </div>
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                <select  class="form-control" id="search_for" name="search_for">
                                    <option value="0" selected>Selecciona una opción...</option>
                                    <option value="1">Nombre</option>
                                    <option value="2">RFC</option>
                                    <option value="3">CURP</option>
                                    <option value="4">Fecha de nacimiento</option>
                                </select>
                            </div><br>
                            <div class="input-group" id="campo">
                            </div><br>
                            <div id="error"></div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-right button-modal-style" id="buscar" disabled>
                                <i class="fa fa-search"></i> Buscar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cliente</h3>
                        </div>
                         <div class="box-body">
                            <div class="input-group" style="display: none;">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="customer_id" name="customer_id">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Nombre" id="name" name="name">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="RFC" id="rfc" name="rfc">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="CURP" id="curp" name="curp" hidden>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="date" class="form-control" placeholder="Fecha de nacimiento" id="birthdate" name="birthdate">
                            </div><br>
                        </div>
                        <div class="box-footer">
                            <a href="#" class="btn btn-success pull-right" id="generar">
                                Generar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var option = "";
            $('#search_for').change(function(){
                option = $(this).val();
                $("#error").empty();
                clearFields();
                var searchButton = $("#buscar");
                if(option == 1) {
                    $('#campo').empty();
                    $('#campo').append("<span class='input-group-addon'><i class='fa fa-user'></i></span>\
                        <input type='text' class='form-control' placeholder='Nombre' id='valor'>");
                    value = "";
                }
                else if(option == 2) {
                    $('#campo').empty();
                    $('#campo').append('<span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>\
                        <input type="text" class="form-control" placeholder="RFC" id="valor">');
                    value = "";
                }
                else if(option == 3) {
                    $('#campo').empty();
                    $('#campo').append('<span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>\
                        <input type="text" class="form-control" placeholder="CURP" id="valor">');
                    value = "";
                }
                else if(option == 4) {
                    $('#campo').empty();
                    $('#campo').append('<span class="input-group-addon"><i class="fa fa-calendar"></i></span>\
                        <input type="date" class="form-control" placeholder="Fecha de nacimiento" id="valor">');
                    value = "";

                } else {
                    $('#campo').empty();
                    $('#campo').append('<h5 class="text-danger" style="text-align: center;">Selecciona una opción válida</h5>');
                    value = "";
                }

                if(option > 0) {
                    $('#buscar').prop('disabled', false);
                } else {
                    $('#buscar').prop('disabled', true);
                }

            });
            $('#buscar').click(function() {
                value = $("#valor").val();
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: '/search-buro-customers',
                    type: 'POST',
                    dataType: "json",
                    data: {"option": option,"value": value ,_token: token},
                    success: function(response) {
                        if(response.status == 0) {
                            $("#error").empty();
                            $("#error").append('<span class="text-danger">Llena el campo para continuar</span>');
                            clearFields();
                        } else if(response.status == 2) {
                            $("#error").empty();
                            $("#error").append('<span class="text-danger">El cliente no existe o no está en buro de crédito</span>');
                            clearFields();
                        } else{
                            $("#error").empty();
                            $("input[name=customer_id]").val(response.customer.id);
                            $("input[name=name]").val(response.customer.name);
                            $("input[name=rfc]").val(response.customer.rfc);
                            $("input[name=curp]").val(response.customer.curp);
                            $("input[name=birthdate]").val(response.customer.birthdate);
                            $('#generar').attr({
                                'href': '/generar-reporte/'+response.customer.id+'',
                            });
                        }
                    },
                    error: function(error) {

                    }
                });
            })
        });

        function clearFields() {
            $("#customer_id").val("");
            $("#name").val("");
            $("#rfc").val("");
            $("#curp").val("");
            $("#birthdate").val("");
        }
    </script>
@endsection
