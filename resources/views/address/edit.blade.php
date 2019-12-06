@extends('adminlte::layouts.app')

@section('title')
	Actualizar Dirección
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
            <form action="{{ route('direcciones.update', $address->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="col-md-8 col-md-offset-2">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Actualizar Dirección</h3>
                        </div>
                        <div class="box-body">
                            <div>
                                <input type="text" class="form-control" name="customer_id" value="{{ $address->customer_id }}" style="display: none;" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" class="form-control" placeholder="Calle" id="street" name="street" value="{{ $address->street }}">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="Número externo" id="external_number" name="external_number" value="{{ $address->external_number }}">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="Número interno" id="internal_number" name="internal_number" value="{{ $address->internal_number }}">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                <input type="text" class="form-control" placeholder="Entre calles" id="between_streets" name="between_streets" value="{{ $address->between_streets }}">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="Código postal" id="postal_code" name="postal_code" value="{{ $address->postal_code }}">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" class="form-control" placeholder="Colonia" id="neighborhood" name="neighborhood" value="{{ $address->neighborhood }}">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                <input type="text" class="form-control" placeholder="País" id="country" name="country" value="{{ $address->country }}">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                <input type="text" class="form-control" placeholder="Estado" id="state" name="state" value="{{ $address->state }}">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                <input type="text" class="form-control" placeholder="Ciudad" id="city" name="city" value="{{ $address->city }}">
                            </div> <br>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-right button-modal-style">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <a type="button" class="btn btn-default pull-left" href="{{ route('clientes.index') }}">
                                <i class="fa fa-close"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
