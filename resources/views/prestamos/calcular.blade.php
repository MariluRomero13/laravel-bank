@extends('adminlte::layouts.app')

@section('title')
	Créditos
@endsection

@section('links')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Calcular tabla de amortización</h3>
                </div>
                <div class="box-body">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-dollar"></i></span>
                        <input type="text" class="form-control" placeholder="Monto de prestamo" id="prestamo" name="prestamo" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-sort-numeric-desc "></i></span>
                        <select  class="form-control" id="tipo_pago" name="tipo_pago" required>
                            <option value="0" selected>Selecciona el tipo de pago</option>
                            <option value="1">Mensual</option>
                            <option value="2">Quincenal</option>
                        </select>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calculator"></i></span>
                        <input type="text" class="form-control" placeholder="Interes" id="interes" name="interes" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-sort-numeric-desc "></i></span>
                        <input type="text" class="form-control" placeholder="Años a pagar" id="years" name="years" required>
                    </div><br>
                </div>
                <div class="box-footer">
                    <a href="#" class="btn btn-success pull-right" id="calcular"> Generar </a>    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#calcular').click(function() {
                var prestamo = $("input[name=prestamo]").val();
                var tipo_pago = $("select[id=tipo_pago]").val();
                var interes = $("input[name=interes]").val();
                var years = $("input[name=years]").val();
                $('#calcular').attr({
                    'href': '/tabla-amortizacion/'+tipo_pago+'/'+interes+'/'+prestamo+'/'+years+'',
                });
            })
        })
    </script>
@endsection