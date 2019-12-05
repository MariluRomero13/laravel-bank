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
						<h3 class="box-title">Reportes</h3>
					</div>
                    <div class="box-body">
                        <ol>
                            @foreach ($messages as $message)
                                <li>{{ $message->message }}</li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="box-footer">

                        <a type="button" class="btn btn-default pull-left" href="{{ url('buro-credito') }}">
                            <i class="fa fa-arrow-left"></i> Volver
                        </a>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection

