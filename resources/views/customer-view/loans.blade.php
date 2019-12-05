@extends('adminlte::layouts.app')

@section('title')
	Préstamos
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
              <h3 class="box-title">Préstamos</h3>
            </div>
            <div class="box-body">

                <div class="table-responsive" style="margin-top: 2%;">
                    <table id="loansTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Institucion</th>
                                <th>Años a pagar</th>
                                <th>Tipo de pago</th>
                                <th>Interes</th>
                                <th>Prestamo</th>
                                <th>Total a pagar</th>
                                <th>Fecha de prestamo</th>
                                <th>Pagos</th>
                            </tr>
                            @foreach($loans as $loan)
                                <tr>
                                    <td>{{$loan->name}}</td>
                                    <td>{{$loan->years_to_pay}}</td>
                                    @if($loan->payment_type == 1)
                                        <td>Mensual</td>
                                    @else
                                        <td>Quincenal</td>
                                    @endif
                                    <td>{{$loan->interest_rate}}</td>
                                    <td>{{$loan->loan_amount}}</td>
                                    <td>{{$loan->total_amount_to_pay}}</td>
                                    <td>{{$loan->loan_date}}</td>
                                    <td>
                                        <a href="{{ url('cliente-pagos', $loan->loan_id) }}" class="btn btn-info">
                                            <i class="fa fa-money"></i>
                                        </a>
                                    </td>
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
