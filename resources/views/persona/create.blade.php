@extends('adminlte::page')
@section('content')

<div class="row">
    <div class="col-12">
    	 <form action="{{ url('/usuario') }}" method="POST" role="form" data-toggle="validator" class="form" id="personaForm" name="personaForm">
            {{ csrf_field() }}

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Datos Personales</h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">C&eacute;dula:</label>
                            <input type="text" class="form-control" maxlength="9" name="cedula">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Correo Electr&oacute;nico:</label>
                            <input class="form-control text-lowercase" type="text" name="email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Nombres:</label>
                            <input type="text" class="form-control text-uppercase" name="nombres">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Apellidos:</label>
                            <input class="form-control text-uppercase" type="text" name="apellidos">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Tel&eacute;fono Local:</label>
                            <input class="form-control mask_tlf" type="text" name="telefono_local">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Tel&eacute;fono M&oacute;vil:</label>
                            <input class="form-control mask_tlf" type="text" name="telefono_movil">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4" id="divEntidad" >
                            <div class="form-group">
                              <label for="entidad_id">Entidad</label>
                              <select class="form-control" name="entidad_id"  id="entidad_id">
                                <option value="" selected>Seleccione una opción</option>
                                {{--@foreach($entidad as $combo)
                                  <option value="{{ $combo->id }}">{{ $combo->nombre_entidad }}</option>
                                @endforeach--}}
                              </select>
                            </div>
                          </div>
                        <div class="col-md-4" id="divMunicipio" >
                          <div class="form-group">
                            <label for="municipio_id">Municipio</label>
                            <select class="form-control" name="municipio_id"  id="municipio_id">
                              <option value="" selected>Seleccione una opción</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4" id="divParroquia" >
                          <div class="form-group">
                            <label for="parroquia_id">Parroquia</label>
                            <select class="form-control" name="parroquia_id"  id="parroquia_id">
                              <option value="" selected>Seleccione una opción</option>
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="urbanizacion">Urbanizaci&oacute;n</label>
                                <input class="form-control" type="text" name="urbanizacion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tzona">Zona</label>
                                <select class="form-control" name="tzona"  id="tzona">
                                <option value="" selected>Seleccione una opción</option>
                                    {{--@foreach($zonas as $combo)
                                      <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nzona">Nombre de zona</label>
                                <input class="form-control" type="text" name="nzona">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tcalle">Area:</label>
                                <select class="form-control" name="tcalle"  id="tcalle">
                                <option value="" selected>Seleccione una opción</option>
                                    {{--@foreach($area as $combo)
                                      <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ncalle">Nombre de Area</label>
                                <input class="form-control" type="text" name="ncalle">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tvivienda">Hogar:</label>
                                <select class="form-control" name="tvivienda"  id="tvivienda">
                                <option value="" selected>Seleccione una opción</option>
                                    {{--@foreach($hogar as $combo)
                                      <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nvivienda">Nombre Hogar:</label>
                                <input class="form-control" type="text" name="nvivienda">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Carga Familiar</h3>
                </div>
                    {{--<form role="form" action="{{ url('/bombonas') }}" id="pdvsa" method="POST">--}}
    
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                          <label for="nombres"> Nombres:</label>
                          <input id="nombres" class="form-control" type="text" name="nombres">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="apellidos">Apellido:</label>
                          <input id="apellidos" class="form-control" type="text" name="apellidos">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                          <label for="cedula">Cedula:</label>
                          <input id="cedula" class="form-control" type="text" name="cedula">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="fecha">fecha Nacimiento:</label>
                          <input id="fecha" class="form-control" type="text" name="fecha">
                        </div>
                        <div class="form-group col-4">
                          <label for="parentezco">Parentezco:</label>
                          <select class="form-control" name="parentezco" id="parentezco">
                              <option value="" selected>Seleccione una opci&oacute;n</option>
                              <option value="1">Madre</option>
                              <option value="2">Padre</option>
                              <option value="3">Hijo</option>
                              <option value="4">Hija</option>
                              <option value="5">Suegro</option>
                              <option value="6">Suegra</option>
                              <option value="7">Sobrina</option>
                              <option value="8">Sobrino</option>
                          </select>
                        </div>
                    </div>
                    <hr>
                    {{--<div class="row">
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
                          <label>Cantidad:</label>
                          <input id="cantidad" class="form-control" type="text" placeholder="Cantidad" name="cantidad">
                        </div>
                    </div>--}}
                    <div class="row">
                        <div class="form-group col-12">
                            <div class="float-right">
                                <button id="btnAgregarFamiliar" class="btn btn-success" type="button">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered table-hover ">
                          <thead>
                            <tr>
                              <th>Nombres</th>
                              <th>Apellidos</th>
                              <th>Cedula</th>
                              <th>Fecha</th>
                              <th>Parentezco</th>
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
                        <a href="{{ url('/personas') }}" type="button" class="btn btn-danger">Cancelar</a>
                        <button class="btn btn-primary" type="submit" id="registrar">Enviar</button>
                    </div>
                </div>

                {{--<div class="card-body">

                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="button" onclick="verificarIgualdad();" class="btn btn-outline-primary" id="setPass">Aceptar</button>
                            <a href="{{ url('/usuario') }}" type="button" class="btn btn-outline-danger">Cancelar</a>
                        </div>
                    </div>

                </div>--}}
            </div>

        </form>
    </div>
</div>

{{--<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>--}}
<script>
$(document).ready(function(){
   
  $('#btnAgregarFamiliar').on('click', function() {
      accionAgregarFamiliar();
  })

  accionAgregarFamiliar = function () {
    var id = ++$("input[name='personaTemp[]']").length
    let nombres = $('#nombres').val()
    let apellidos = $('#apellidos').val()
    let cedula = $('#cedula').val()
    let fecha = $('#fecha').val()
    let parentezco = $('#parentezco').val()
    let parentezcotxt = $('#parentezco option:selected').text()

    let data = {
        id: id,
        nombres: nombres,
        apellidos: apellidos,
        cedula: cedula,
        fecha: fecha,
        parentezco: parentezco,
        parentezcotxt: parentezcotxt
    }

    //console.log(data);

    let accion = JSON.stringify(data)
    console.log(accion);
    if (nombres !== '' && apellidos !== '' && fecha !== '' && parentezco !== '') {
        $('#mytable').append(`
         
            <tr id="row${id}">
                <td style="display: none">
                    <input type="hidden" name="personaTemp[]" value='${accion}' />
                </td>
                <td>${nombres}</td>
                <td>${apellidos}</td>
                <td>${cedula}</td>
                <td>${fecha}</td>
                <td>${parentezcotxt}</td>
                <td>
                    <button type="button" class="btn btn-danger" onclick='eliminarFamiliar(${id})'>
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
$('#nombres').val('');
$('#apellidos').val('');
$('#cedula').val('');
$('#fecha').val('');
$('#parentezco').val('');

  }
  
//elimina el registro selecionado
eliminarFamiliar = function (id) {
    $('#row'+id).remove();
}

});    

$('#entidad_id').change(function ()
    {
        $.ajax({
            method: "POST",
            {{--url: "{{ url('/municipioAjaxUser') }}",--}}
            data: {entidad_id: $('#entidad_id').val(), '_token': $('input[name=_token]').val()},
            success: function (response) {
                $('#municipio_id').html(response);
                $("#parroquia_id").empty();
                $('#parroquia_id').append('<option value="" selected>Seleccione una opción</option>');

            },
            beforeSend: function () {
                $('#municipio_id').append('<option value="" selected>Buscando...</option>');

            }
            });
    });

  $('#municipio_id').change(function ()
    {
        $.ajax({
            method: "POST",
            {{--url: "{{ url('/parroquiaAjaxUser') }}",--}}
            data: {municipio_id: $('#municipio_id').val(), '_token': $('input[name=_token]').val()},
            success: function (response) {
            $('#parroquia_id').html(response);

            },
            beforeSend: function () {
            $('#parroquia_id').append('<option value="" selected>Buscando...</option>');

            }
        });
                
});
</script>
@section('footer')
<div></div>
@endsection

@endsection