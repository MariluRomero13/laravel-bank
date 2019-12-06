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
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tabla de Amortización</h3>
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
                                            <td>{{$c->fecha}}</td>
                                            <td>{{$c->cuota}}</td>
                                            <td>{{$c->interes}}</td>
                                            <td>{{$c->amortizacion}}</td>
                                            <td>{{$c->pendiente}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a type="button" class="btn btn-primary pull-right" href="{{ url('print-pdf-loan', [$payment_type, $i, $loan_amount, $years_to_pay]) }}">
                            <i class="fa fa-print"></i> Imprimir
                        </a>
                        <a type="button" class="btn btn-default pull-left" href="{{ url('show-loans-view') }}">
                            <i class="fa fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
