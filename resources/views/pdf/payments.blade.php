<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Reporte de Pagos</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tabla de Amortización</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive" style="margin-top: 2%;">
                            <table id="addressTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No. pago</th>
                                        <th>Fecha de pago</th>
                                        <th>Pago</th>
                                        <th>Interes</th>
                                        <th>Amortizacion</th>
                                        <th>Saldo pendiente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collection as $c)
                                        <tr>
                                            <td>{{$c->num_pago}}</td>
                                            <td>{{$c->fecha}}</td>
                                            <td>{{$c->cuota}}</td>
                                            <td>{{$c->interes}}</td>
                                            <td>{{$c->amortizacion}}</td>
                                            <td>{{$c->pendiente}}</td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>      
                </div>
            </div> 
        </div>
    </div>
</body>
</html>