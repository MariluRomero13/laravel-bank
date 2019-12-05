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
              <h3 class="box-title">Créditos</h3>
            </div>
            <div class="box-body">

                    <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Institución</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Comportamiento</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($credits as $credit)
                            <tr>

                                    <td>
                                        {{$credit->name}}
                                    </td>

                                    <td>
                                            @switch($credit->credit_type)
                                            @case(1)
                                                Crédito
                                                @break
                                            @case(2)
                                                Débito
                                                @break
                                        @endswitch
                                    </td>
                                    <td>{{$credit->description}}</td>
                                    <td>
                                        @switch($credit->status)
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
                                    <td>
                                            @switch($credit->behavior)
                                            @case(1)
                                                <a class="btn btn-success">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                @break
                                            @case(2)
                                                <a class="btn btn-warning">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                                @break
                                            @case(3)
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
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
@endsection
