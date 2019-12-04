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
              <h3>#Numero de prestamos</h3>

              <p>Prestamos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Más informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>#Numero de créditos<sup style="font-size: 20px">%</sup></h3>

              <p>Créditos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Más informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>#Numero de tarjetas</h3>

              <p>Tarjetas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
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
                <li class="list-group-item"><b>Nombre: </b>Misalami </li>
                <li class="list-group-item"><b>Email: </b>Misalami </li>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                Datos personales
                </a>
                <li class="list-group-item"><b>Nombre: </b>Misalami </li>
                <li class="list-group-item"><b>Apellidos </b>De la Torre Gurrola </li>
                <li class="list-group-item"><b>CURP: </b>Misalami </li>
                <li class="list-group-item"><b>RFC: </b>Misalami </li>
                <li class="list-group-item"><b>Fecha de nacimiento: </b>Misalami </li>
            </div>
        
        </div>
    </div>


    <div class="row">
            <div class="col-md-12">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action active">
                    Direcciones
                    </a>
                    <li class="list-group-item"><b>Calle: </b>Misalami </li>
                    <li class="list-group-item"><b>Numero externo: </b>Misalami </li>
                    <li class="list-group-item"><b>Numero interno: </b>Misalami </li>
                    <li class="list-group-item"><b>Entre calles: </b>Misalami </li>
                    <li class="list-group-item"><b>Codigo postal: </b>Misalami </li>
                    <li class="list-group-item"><b>Colonia : </b>Misalami </li>
                    <li class="list-group-item"><b>País </b>Misalami </li>
                    <li class="list-group-item"><b>Estado: </b>Misalami </li>
                    <li class="list-group-item"><b>Ciudad: </b>Misalami </li>
                </div>
            </div>
    </div>
    </section>
@endsection
