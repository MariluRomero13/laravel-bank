@extends('adminlte::layouts.app')

@section('title')
	Créditos
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Editar crédito</h3>
					</div>
                    <form action="{{ route('creditos.update', $credit->id) }}" method="POST">
					    <div class="box-body">
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
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input disabled type="text" class="form-control" required autofocus value="{{ $customer->name }} {{ $customer->first_last_name }} {{ $customer->second_last_name }}">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                <input type="text" class="form-control" required autofocus value="{{ $place->name }}" disabled>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <select  class="form-control" id="credit_type" name="credit_type" value="{{ $credit->credit_type }}" disabled>
                                    <option value="1">Bancario</option>
                                    <option value="2">No Bancario</option>
                                </select>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <select  class="form-control" id="behavior" name="behavior">
                                    @if($credit->behavior == 1)
                                        <option value="{{ $credit->behavior }}" selected="true">Verde</option>
                                        <option value="2">Amarillo</option>
                                        <option value="3">Rojo</option>
                                    @elseif($credit->behavior == 2)
                                        <option value="1">Verde</option>
                                        <option value="{{ $credit->behavior }}" selected="true">Amarillo</option>
                                        <option value="3">Rojo</option>
                                    @else
                                        <option value="1">Verde</option>
                                        <option value="2">Amarillo</option>
                                        <option value="{{ $credit->behavior }}" selected="true">Rojo</option>
                                    @endif
                                </select>
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <select  class="form-control" id="status" name="status">
                                    @if($credit->status)
                                        <option value="{{ $credit->status }}" selected="true">Activo</option>
                                        <option value="0">Inactivo</option>
                                    @else
                                        <option value="1">Activo</option>
                                        <option value="{{ $credit->status }}" selected="true">Inactivo</option>
                                    @endif
                                </select>
                            </div><br>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Descripción ..." id="description" name="description">{{ $credit->description }}</textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-right button-modal-style">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <a type="button" class="btn btn-default pull-left" href="{{ route('creditos.index') }}">
                                <i class="fa fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
@endsection

