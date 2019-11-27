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
						<h3 class="box-title">Registrar instituciones</h3>
					</div>
                    <form action="{{ route('instituciones.store') }}" method="POST">
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
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                <input type="text" class="form-control" placeholder="Nombre de la institución" id="name" name="name"  autofocus value="{{ old('name') }}">
                            </div><br>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-right button-modal-style">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <a type="button" class="btn btn-default pull-left" href="{{ route('instituciones.index') }}">
                                <i class="fa fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
@endsection

