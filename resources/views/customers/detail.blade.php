@extends('adminlte::layouts.app')

@section('title')
	Detalles del Cliente
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <!--div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Informacíon del Cliente</h3>
                </div>
                <div class="box-body">
                </div>    
                <div class="box-footer">
                </div>    
            </div>
        </div-->
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Direcciones</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive" style="margin-top: 2%;">
                        <table id="addressTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Calle</th>
                                    <th>Colonia</th>
                                    <th>Número Externo</th>
                                    <th>Número Interno</th>
                                    <th>Código postal</th>
                                    <th>Acciones</th>
                                    <!--th>Estado</th-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($address as $a)
                                    <tr>
                                        <td>{{$a->street}}</td>
                                        <td>{{$a->neighborhood}}</td>
                                        <td>{{$a->external_number}}</td>
                                        <td>{{$a->internal_number}}</td>
                                        <td>{{$a->postal_code}}</td>
                                        <td><a href="/clientes/editar/direcciones/{{$a->id}}" class="btn btn-warning"><i class='fa fa-edit'></i></a></td>
                                        <!--td><a href="" class="btn btn-success"><i class='fa fa-check'></i></a></td-->
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>    
                <div class="box-footer">
                    <a type="button" class="btn btn-default pull-left" href="{{ route('clientes.index') }}">
                        <i class="fa fa-close"></i> Volver
                    </a>
                </div>    
            </div>
        </div>    
@endsection
