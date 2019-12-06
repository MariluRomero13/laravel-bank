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
            <h3 class="box-title">Pagos</h3>
        </div>
        <div class="box-body">
            @csrf
            <table id="loansTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Institución</th>
                        <th>Préstamo</th>
                        <th>Totál a pagar</th>
                        <th>Fecha de pago</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($cu as $a)
                        <tr>
                            <td>{{$a->customer}}</td>
                            <td>{{$a->place_name}}</td>
                            <td>${{$a->loan_amount}}</td>
                            <td>${{$a->total_amount_to_pay}}</td>
                            <td>{{$a->loan_date}}</td>
                            <td><a href="pagos/{{$a->loan_id}}" class="btn btn-warning"><i class='fa fa-edit'></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                {{$cu->links()}}
            </div>
        </div>
</section>
@endsection

