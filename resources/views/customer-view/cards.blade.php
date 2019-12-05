@extends('adminlte::layouts.app')

@section('title')
	Tarjetas
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

                    <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Número de tarjeta</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Fecha de expiración</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Estado</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($cards as $card)
                            <tr>
                                    <th scope="row">{{$card->card_number}}</th>
                                    <td>
                                            @switch($card->card)
                                            @case(1)
                                                MasterCard
                                                @break
                                            @case(2)
                                                Visa
                                                @break
                                            @case(3)
                                                CityBanamex
                                                @break
                                             @endswitch
                                    </td>
                                    <td>{{$card->expiration_date}}</td>
                                    <td>
                                            @switch($card->card_type)
                                            @case(1)
                                                Crédito
                                                @break
                                            @case(2)
                                                Débito
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($card->status)
                                            @case(1)
                                                <a class="btn btn-success">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                @break
                                            @case(2)
                                                <a class="btn btn-danger">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                            @break
                                        @endswitch
                                    </td>

                            </tr>
                            @endforeach

                            </tbody>
                          </table>

            </div>
          </div>
    </section>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
@endsection
