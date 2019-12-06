@extends('adminlte::layouts.app')

@section('title')
	Pagos
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
            <h3 class="box-title">Detalles</h3>
        </div>
        <div class="box-body">
            @csrf
            <table id="loansTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Numero de pago</th>
                        <th>Fecha Limite de pago</th>
                        <th>Cantidad a pagar</th>
                        <th>Intereses</th>
                        <th>Capital Amortizado</th>
                        <th>Capital Final</th>
                        <th>Pagado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagos as $a)
                        <tr>
                            <td>{{$a->payment_number}}</td>
                            <td>{{$a->payment_date}}</td>
                            <td>${{$a->amount_to_pay}}</td>
                            <td>${{$a->interest}}</td>
                            <td>${{$a->amortized_capital}}</td>
                            <td>${{$a->final_capital}}</td>
                            @if($a->status==1)
                                <td><a class="btn btn-success"><i class='fa fa-check'></i></a></td>
                            @else
                                <td><a class="btn btn-danger"><i class='fa fa-close'></i></a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="box-footer">
                <a type="button" class="btn btn-default pull-left" href="/prestamos">
                    <i class="fa fa-close"></i> Volver
                </a>
            </div>
        </div>
        </div>
</section>
@endsection
