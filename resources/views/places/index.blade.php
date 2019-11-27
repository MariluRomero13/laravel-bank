@extends('adminlte::layouts.app')

@section('title')
	Instituciones
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('main-content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Instituciones</h3>
            </div>
            <div class="box-body">
                <a href="{{ route('instituciones.create')}}" type="button" class="btn btn-primary button-style">
                        <i class="fa fa-user-plus"></i> Agregar
                </a>
                <div class="table-responsive" style="margin-top: 2%;">
                    <table id="placesTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $places as $place )
                                <tr>
                                    <td>{{ $place->id}}</td>
                                    <td>{{ $place->name }}</td>
                                    
                                    <td>
                                        <a class="btn btn-warning" type="submit" href="{{ route('instituciones.edit',$place->id) }}">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        <a class="btn btn-danger delete" type="submit" href="{{ route('instituciones.destroy',$place->id) }}">
                                                <i class="fa fa-edit"></i>
                                        </a>
                                    
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
    </section>
@endsection

@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
   $(document).ready(function() {
        $('#placesTable').DataTable();

    });
</script>
<script>
        $(".delete").click(function(){
            console.log('holaa')
            var place_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax(
            {
                url:"/instituciones/destroy/"+place_id,
                type: "GET",
                data: {
                    "id": place_id,
                    "_token": token,
                },
                success: function (response){
                    console.log("it Works");
                    console.log(response)
                    //$('#usersTable').DataTable().ajax.reload();
                }
            });
        });
    </script>
@endsection