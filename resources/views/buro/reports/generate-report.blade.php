@extends('adminlte::layouts.app')

@section('title')
	Reporte
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Reporte</h1>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div>
                        <h4>Datos del cliente</h4>
                        <table id="customerTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>CURP</th>
                                    <th>RFC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $customer->name }} {{ $customer->first_last_name }} {{ $customer->second_last_name }}</td>
                                    <td>{{ $customer->curp }}</td>
                                    <td>{{ $customer->rfc }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <h4>Direcciones</h4>
                        <table id="addressTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Calle</th>
                                    <th>N° exterior</th>
                                    <th>N° interior</th>
                                    <th>Entre calles</th>
                                    <th>Código postal</th>
                                    <th>Colonia</th>
                                    <th>País</th>
                                    <th>Estado</th>
                                    <th>Ciudad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addresses as $a )
                                    <tr>
                                        <td>{{ $a->street }}</td>
                                        <td>{{ $a->external_number }}</td>
                                        <td>{{ $a->internal_number }}</td>
                                        <td>{{ $a->between_streets }}</td>
                                        <td>{{ $a->postal_code }}</td>
                                        <td>{{ $a->neighborhood }}</td>
                                        <td>{{ $a->country }}</td>
                                        <td>{{ $a->state }}</td>
                                        <td>{{ $a->city }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h4>Créditos</h4>
                        <table id="addressTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Institución</th>
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                    <th>Fecha de registro</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($credits as $c)
                                    <tr>
                                        <td>{{ $c->code }}</td>
                                        <td>{{ $c->place }}</td>
                                        <td>
                                            @switch($c->credit_type)
                                                @case(1)
                                                    Crédito
                                                    @break
                                                @case(2)
                                                    Débito
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>{{ $c->description }}</td>
                                        <td>{{ $c->register_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h4>Reportes</h4>
                        <ol>
                            @foreach ($messages as $m)
                                <li>{{ $m->message }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ url('print-pdf', $customer->id) }}" class="btn btn-default pull-right button-modal-style">
                        <i class="fa fa-print"></i> Imprimir
                    </a>
                    <a type="button" class="btn btn-default pull-left" href="{{ url('buscar-cliente') }}">
                        <i class="fa fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
