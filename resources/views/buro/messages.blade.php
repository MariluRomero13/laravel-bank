@extends('adminlte::layouts.app')

@section('title')
	Instituciones
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
						<h3 class="box-title">Registrar reportes</h3>
					</div>
                    <form action="{{ url('registrar-mensaje') }}" method="POST">
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
                            <div class="form-group" style="display: none;">
                                <input class="form-control" value="{{ $buro->id }}" id="buro_id" name="buro_id">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="10" placeholder="Descripción ..." id="message" name="message" value="{{ old('message') }}" required></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-right button-modal-style">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <a type="button" class="btn btn-default pull-left" href="{{ url('buro-credito') }}">
                                <i class="fa fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
@endsection

