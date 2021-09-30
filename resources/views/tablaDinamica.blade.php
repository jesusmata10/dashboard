@extends('layouts.adminlte')

@section('content')
<!--<div class="row">-->
<p>Index</p>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registro de Bombonas</h3>
        </div>
        
        <form role="form">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name"> Nombre y Apellido:</label>
                      <input id="name" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cedula">Cedula:</label>
                      <input id="cedula" class="form-control" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="direccion">Direccion:</label>
                      <input id="direccion" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="codigo">Codigo:</label>
                      <input id="codigo" class="form-control" type="text">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-4">
                      <label for="bombona">Bombona:</label>
                      <input id="bombona" class="form-control" type="text" placeholder="bombona" required="requerido">
                    </div>
                    <div class="form-group col-4">
                      <label for="">Kilo:</label>
                      <select class="form-control" name="estatus" id="estatus">
                          <option value="" selected>Seleccione una opci&oacute;n</option>
                          <option value="0">10 Kg</option>
                          <option value="1">18 Kg</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Cantidad:</label>
                      <input id="cantidad" class="form-control" type="text" placeholder="Cantidad">
                    </div>
                </div>
                <div class="form-group">
                    <button id="adicionar" class="btn btn-success" type="button">Agregar</button>
                </div>
                <div class="form-group">
                    <p>Elementos en la Tabla:
                      <div id="adicionados"></div>
                    </p>
                    <table  id="mytable" class="table table-bordered table-hover ">
                      <tr>
                        <th>Bombona</th>
                        <th>Kilo</th>
                        <th>Cantidad</th>
                        <th>Acción</th>
                      </tr>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </div>
    
@section('script')
<script>

    $(document).ready(function() {
        //obtenemos el valor de los input
        $('#adicionar').click(function() {
          var bombona = document.getElementById("bombona").value;
          var kilo = document.getElementById("kilo").value;
          var cantidad = document.getElementById("cantidad").value;
          var i = 1; //contador para asignar id al boton que borrara la fila
          var fila = '<tr id="row' + i + '"><td>' + bombona + '</td><td>' + kilo + '</td><td>' + cantidad + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>';
          i++;

          $('#mytable tr:first').after(fila);
            $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#mytable tr").length;
            $("#adicionados").append(nFilas - 1);
            //le resto 1 para no contar la fila del header
            document.getElementById("kilo").value ="";
            document.getElementById("cantidad").value = "";
            document.getElementById("bombona").value = "";
            document.getElementById("bombona").focus();
          });
        $(document).on('click', '.btn_remove', function() {
          var button_id = $(this).attr("id");
            //cuando da click obtenemos el id del boton
            $('#row' + button_id + '').remove(); //borra la fila
            //limpia el para que vuelva a contar las filas de la tabla
            $("#adicionados").text("");
            var nFilas = $("#mytable tr").length;
            $("#adicionados").append(nFilas - 1);
          });
        });
</script>
@endsection

@endsection