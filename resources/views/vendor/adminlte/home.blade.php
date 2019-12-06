@extends('adminlte::layouts.app')

@section('title')
	Dashboard
@endsection


@section('main-content')
    @if(Auth::user()->role_id == 1)
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>{{$customers}}</h3>

                        <p>Clientes</p>
                        </div>

                        <a href="{{ url('clientes') }}" class="small-box-footer">Más informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                        <h3>{{$loans}}</h3>

                        <p>Prestamos</p>
                        </div>

                        <a href="#" class="small-box-footer">Más informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>{{$credits}}</h3>

                        <p>Créditos</p>
                        </div>

                        <a href="{{ url('creditos') }}" class="small-box-footer">Más informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3>{{$cards}}</h3>

                        <p>Tarjetas</p>
                        </div>

                        <a href="{{ url('tarjetas') }}" class="small-box-footer">Más informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="container-fluid spark-screen">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Dashboard</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <h2 class="text-center">Bienvenido</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="content">
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>{{$loans}}</h3>

                        <p>Prestamos</p>
                        </div>

                        <a href="#" class="small-box-footer">Más informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>{{$credits}}</h3>

                        <p>Créditos</p>
                        </div>

                        <a href="#" class="small-box-footer">Más informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3>{{$cards}}</h3>

                        <p>Tarjetas</p>
                        </div>

                        <a href="#" class="small-box-footer">Más informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active">
                        Datos de la cuenta
                        </a>
                        <li class="list-group-item"><b>Nombre: </b>{{Auth::user()->name}} </li>
                        <li class="list-group-item"><b>Email: </b>{{Auth::user()->email}} </li>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                        Datos personales
                        </a>
                        <li class="list-group-item"><b>Nombre: </b>{{$customer->name}} </li>
                    <li class="list-group-item"><b>Apellidos </b>{{$customer->first_last_name}} {{$customer->second_last_name}}</li>
                        <li class="list-group-item"><b>CURP: </b>{{$customer->curp}} </li>
                        <li class="list-group-item"><b>RFC: </b>{{$customer->rfc}} </li>
                        <li class="list-group-item"><b>Fecha de nacimiento: </b>{{$customer->birthdate}} </li>
                        <li class="list-group-item"><b>Telefono: </b>{{$customer->phone}} </li>
                    </div>

                </div>
            </div>


        <div class="row">
            @if ($adresses==Null)
            <div class="card">
                <div class="card-body">
                    Ninguna dirección registrada
                </div>
            </div>
            @endif
            @foreach ($adresses as $adress)
                <div class="col-md-3">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active">
                        Direcciones
                        </a>
                        <li class="list-group-item"><b>Calle: </b>{{$adress->street}} </li>
                        <li class="list-group-item"><b>Numero externo: </b>{{$adress->external_number}} </li>
                        <li class="list-group-item"><b>Numero interno: </b>{{$adress->internal_number}} </li>
                        <li class="list-group-item"><b>Entre calles: </b>{{$adress->between_streets}} </li>
                        <li class="list-group-item"><b>Codigo postal: </b>{{$adress->postal_code}} </li>
                        <li class="list-group-item"><b>Colonia : </b>{{$adress->neighborhood}} </li>
                        <li class="list-group-item"><b>País </b>{{$adress->country}} </li>
                        <li class="list-group-item"><b>Estado: </b>{{$adress->state}} </li>
                        <li class="list-group-item"><b>Ciudad: </b>{{$adress->city}} </li>
                    </div>
                </div>
            @endforeach
            </div>
        </section>
    @endif
@endsection
