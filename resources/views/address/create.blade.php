@extends('adminlte::layouts.app')

@section('title')
	Registrar Dirección
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Hay algunos problemas con los campos<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('direcciones.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-8 col-md-offset-2">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Registrar Dirección</h3>
                        </div>
                        <div class="box-body">
                            <div>
                                <input type="text" class="form-control" name="customer_id" value="{{ $customer->id }}" style="display: none;" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa  fa-map-marker"></i></span>
                                <input type="text" class="form-control" placeholder="Calle" id="street" name="street" value="{{ old('street') }}" required>
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="Número externo" id="external_number" name="external_number" value="{{ old('external_number') }}" required>
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="Número interno" id="internal_number" name="internal_number" value="{{ old('internal_number') }}" required>
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                <input type="text" class="form-control" placeholder="Entre calles" id="between_streets" name="between_streets" value="{{ old('between_streets') }}" required>
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="Código postal" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" class="form-control" placeholder="Colonia" id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}" required>
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa  fa-flag"></i></span>
                                <input type="text" class="form-control" placeholder="País" id="country" name="country" value="{{ old('country') }}" required>
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                <input type="text" class="form-control" placeholder="Estado" id="state" name="state" value="{{ old('state') }}" required>
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                <input type="text" class="form-control" placeholder="Ciudad" id="city" name="city" value="{{ old('city') }}" required>
                            </div> <br>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-right button-modal-style">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <a type="button" class="btn btn-default pull-left" href="{{ route('clientes.index') }}">
                                <i class="fa fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
