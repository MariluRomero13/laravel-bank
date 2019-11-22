@extends('adminlte::layouts.app')

@section('title')
	Registrar Cliente
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear cuenta</h3>
                    </div>
                    <form action="" method="POST">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Nombre de usuario" id="name" name="name">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="Correo" id="email" name="email">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Registrar cliente</h3>
                    </div>
                    <form action="">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Nombre" id="name" name="name">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Apellido Paterno" id="first_last_name" name="first_last_name">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Apellido Materno" id="second_last_name" name="first_last_name">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="CURP" id="curp" name="curp">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input type="text" class="form-control" placeholder="RFC" id="rfc" name="rcf">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="date" class="form-control" placeholder="Fecha de nacimiento" id="birthdate" name="birthdate">
                            </div> <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="phone" id="phone" name="phone">
                            </div> 
                        </div>  
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-right button-modal-style">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <a type="button" class="btn btn-default pull-left" href="{{ route('clientes.index') }}">
                                <i class="fa fa-close"></i> Volver
                            </a>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection