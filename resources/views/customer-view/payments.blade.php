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
              <h3 class="box-title">Pagos del préstamo</h3>
            </div>
            <div class="box-body">
                <a href="{{ url('cliente-prestamos') }}" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
                <div class="table-responsive" style="margin-top: 2%;">
                    <table id="loansTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N° de pago</th>
                                <th>Fecha a pagar</th>
                                <th>Cantidad a pagar</th>
                                <th>Interés</th>
                                <th>Capital amortizado</th>
                                <th>Capital final</th>
                                <th>Pagado</th>
                            </tr>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $payment->payment_number }}</td>
                                    <td>{{ $payment->payment_date }}</td>
                                    <td>{{ $payment->amount_to_pay }}</td>
                                    <td>{{ $payment->interest }}</td>
                                    <td>{{ $payment->amortized_capital }}</td>
                                    <td>{{ $payment->final_capital }}</td>
                                    @if($payment->status)
                                        <td>
                                            <a class="btn btn-success">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <a class="btn btn-danger">
                                                <i class="fa fa-remove"></i>
                                            </a>
                                        </td>
                                    @endif
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
