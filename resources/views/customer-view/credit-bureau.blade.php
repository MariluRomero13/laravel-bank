@extends('adminlte::layouts.app')

@section('title')
	Buró de crédito
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
              <h3 class="box-title">Buró de crédito</h3>
            </div>
            <div class="box-body">

                <div class="table-responsive" style="margin-top: 2%;">
                    <table id="placesTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Institución</th>
                                <th>Años a pagar</th>
                                <th>Tasa de interes</th>
                                <th>Monto del prestamo</th>
                                <th>Total a pagar</th>
                                <th>Fecha del prestamo</th>
                                <th>Mensaje</th>
                            </tr>
                            @foreach($buro as $b)
                                <tr>
                                    <td>{{$b->name}}</td>
                                    <td>{{$b->years_to_pay}}</td>
                                    <td>{{$b->interest_rate}}</td>
                                    <td>{{$b->loan_amount}}</td>
                                    <td>{{$b->total_amount_to_pay}}</td>
                                    <td>{{$b->loan_date}}</td>
                                    <td>{{$b->message}}</td>
                                </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
          </div>
    </section>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

@endsection
