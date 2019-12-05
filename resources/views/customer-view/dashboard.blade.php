@extends('adminlte::layouts.app')

@section('title')
	Dashboard
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
        <div class="col-lg-3 col-xs-6">
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
        <div class="col-lg-3 col-xs-6">
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
        <div class="col-lg-3 col-xs-6">
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
@endsection
