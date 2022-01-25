@extends('adminlte::page')
@section('content')

 <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Registro de Bombonas</h3>
    </div>
    <form role="form" action="{{ url('/bombonas') }}" id="pdvsa" method="POST">
         {{ csrf_field() }}

        <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="cedula">Cedula:</label>
                <input id="cedula" class="form-control" type="text" name="cedula">
              </div>
                <div class="form-group col-md-6">
                  <label for="name"> Nombre y Apellido:</label>
                  <input id="name" class="form-control" type="text" name="name" readonly="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                  <label for="direccion">Direccion:</label>
                  <input id="direccion" class="form-control" type="text" name="direccion" readonly="">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-4">
                  <label for="">Bombona:</label>
                  <select class="form-control" name="bombona" id="bombona">
                      <option value="" selected>Seleccione una opci&oacute;n</option>
                      <option value="1">Autogas</option>
                      <option value="2">Hermagas</option>
                      <option value="3">Danielgas</option>
                      <option value="4">Pdvsagas</option>
                      <option value="5">Digas</option>
                  </select>
                </div>
                <div class="form-group col-4">
                  <label for="">Kilo:</label>
                  <select class="form-control" name="kilo" id="kilo">
                      <option value="" selected>Seleccione una opci&oacute;n</option>
                      <option value="1">10 Kg</option>
                      <option value="2">18 Kg</option>
                      <option value="3">43 Kg</option>
                  </select>
                </div>
                <div class="form-group col-4">
                  <label>Codigo:</label>
                  <input id="codigo" class="form-control" type="text" placeholder="Codigo" name="codigo">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <div class="float-right">
                        <button id="btnAgregarBombona" class="btn btn-success" type="button">Agregar</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <table class="table table-bordered table-hover ">
                  <thead>
                    <tr>
                      <th>Bombona</th>
                      <th>Kilo</th>
                      <th>Codigo</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tbody id="mytable">
                  </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            <div class="float-right">
                <button class="btn btn-primary" type="submit" id="registrar">Enviar</button>
                <a class="btn btn-danger" href="{{ url('/pdvsa')}}">Cancelar</a>
            </div>
        </div>
    </form>
</div>

@endsection

@section('footer')
<div class="row">

</div>
@stop
@section('js')
<script>

$(document).ready(function(){

  $('#btnAgregarBombona').on('click', function() {
      accionAgregarBombona();
  })

  accionAgregarBombona = function () {
    var id = ++$("input[name='bombonasTemp[]']").length
    let bombona = $('#bombona option:selected').val()
    let bombonaDes = $('select[name="bombona"] option:selected').text()
    let kilo = $('#kilo option:selected').val()
    let kiloDes = $('select[name=kilo] option:selected').text()
    let codigo = $('#codigo').val()

    let data = {
        id: id,
        bombonaDes: bombonaDes,
        bombona: bombona,
        kiloDes: kiloDes,
        kilo: kilo,
        codigo: codigo
    }

    console.log(data);

    let accion = JSON.stringify(data)
    console.log(accion);
    if (bombona !== '' && kilo !== '' && codigo !== '') {
        $('#mytable').append(`

            <tr id="row${id}">
                <td style="display: none">
                    <input type="hidden" name="bombonasTemp[]" value='${accion}' />
                </td>
                <td>${bombonaDes}</td>
                <td>${kiloDes}</td>
                <td>${codigo}</td>
                <td>
                    <button type="button" class="btn btn-danger float-center" onclick='eliminarBombona(${id})'>
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>

        `);

    } else{
       $('#alert').html('Debe cargar toda la información de la sección de Servicios');
       $('#alert').fadeIn();
       setTimeout(function(){ $('#alert').fadeOut(); }, 3000);
    }

//limpia los input despues de insertar
$('#bombona').val('');
$('#kilo').val('');
$('#codigo').val('');

  }

//elimina el registro selecionado
eliminarBombona = function (id) {
    $('#row'+id).remove();
}

});

</script>
@endsection
