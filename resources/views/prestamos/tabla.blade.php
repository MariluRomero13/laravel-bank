@extends('adminlte::layouts.app')

@section('title')
	Tabla de amortización
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Direcciones</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive" style="margin-top: 2%;">
                            <table id="addressTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No. pago</th>
                                        <th>Fecha de pago</th>
                                        <th>Pago</th>
                                        <th>Interes</th>
                                        <th>Amortizacion</th>
                                        <th>Saldo pendiente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collection as $c)
                                        <tr>
                                            <td>{{$c->num_pago}}</td>
                                            <td>{{$c->fecha_pago}}</td>
                                            <td>{{$c->cuota}}</td>
                                            <td>{{$c->intereses}}</td>
                                            <td>{{$c->amortización}}</td>
                                            <td>{{$c->pendiente}}</td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>    
                    <div class="box-footer">
                        <a type="button" class="btn btn-default pull-left" href="{{ route('show-loans-view') }}">
                            <i class="fa fa-close"></i> Volver
                        </a>
                    </div>    
                </div>
            </div> 
        </div>
    </div>
@endsection