@extends('adminlte::layouts.app')

@section('title')
	Usuarios
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
						<h3 class="box-title">Registrar usuarios</h3>
					</div>
                    <form action="{{ route('usuarios.store') }}" method="POST">
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
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Nombre de usuario" id="name" name="name" required autofocus value="{{ old('name') }}">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="Correo" id="email" name="email" required autofocus value="{{ old('email') }}">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" required autofocus value="{{ old('password') }}">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-right button-modal-style">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <a type="button" class="btn btn-default pull-left" href="{{ route('usuarios.index') }}">
                                <i class="fa fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
@endsection

