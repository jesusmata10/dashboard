@extends('adminlte::page')
@section('content')
<?php
    use Carbon\Carbon;
?>
<div class="row">
    <div class="col-12">

        @if (session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{--@if ($search == 'v' && $data->isEmpty())
            <div id="sinResultados"  role="alert">
            </div>
        @elseif ($search != 'v' && $data->isEmpty())
            <div id="sinResultados"  role="alert">
            </div>
        @endif--}}

         <form action="{{ route('personas.store') }}" method="POST" role="form" data-toggle="validator" class="form" id="personaForm" name="personaForm">
            {{ csrf_field() }}

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Datos Personales</h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">C&eacute;dula:</label>
                            <input type="text" class="form-control" maxlength="9" name="cedula">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="correo">Correo Electr&oacute;nico:</label>
                            <input class="form-control text-lowercase" type="text" name="correo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rif">Rif:</label>
                            <input class="form-control text-uppercase" type="text" name="rif">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nombres">Nombres:</label>
                            <input type="text" class="form-control text-uppercase" name="nombres">
                        </div>
                        <div class="form-group col-6">
                            <label for="apellidos">Apellidos:</label>
                            <input class="form-control text-uppercase" type="text" name="apellidos">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="fecha">Fecha:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                                </div>
                                <input type="text" class="form-control float-right datepicker" name="fecha" autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lugarnac">Lugar de Nacimiento:</label>
                            <input class="form-control text-uppercase" type="text" name="lugarnac">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nacionalidad">Nacionalidad:</label>
                            <input class="form-control text-uppercase" type="text" name="nacionalidad">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="telefono_fijo">Tel&eacute;fono Local:</label>
                            <input class="form-control mask_tlf" type="text" name="telefono_fijo">
                        </div>
                        <div class="form-group col-6">
                            <label for="celular">Tel&eacute;fono M&oacute;vil:</label>
                            <input class="form-control mask_tlf" type="text" name="celular">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3" id="divEntidad" >
                            <div class="form-group">
                              <label for="estado_id">Entidad</label>
                              <select class="form-control estado" name="estado_id"  id="entidad_id">
                                <option value="" selected>Seleccione una opción</option>
                                @foreach($entidad as $combo)
                                  <option value="{{ $combo->id }}">{{ $combo->estado }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        <div class="col-md-3" id="divMunicipio" >
                            <div class="form-group">
                                <label for="ciudad_id">Ciudad</label>
                                <select class="form-control" name="ciudad_id"  id="ciudad_id">
                                    <option value="" selected>Seleccione una opción</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3" id="divMunicipio" >
                          <div class="form-group">
                            <label for="municipio_id">Municipio</label>
                            <select class="form-control" name="municipio_id"  id="municipio_id">
                              <option value="" selected>Seleccione una opción</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3" id="divParroquia" >
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
                                <input class="form-control text-uppercase" type="text" name="urbanizacion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tzona">Zona</label>
                                <select class="form-control" name="tzona"  id="tzona">
                                <option value="" selected>Seleccione una opción</option>
                                    @foreach($zonas as $combo)
                                      <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nzona">Nombre de zona</label>
                                <input class="form-control text-uppercase" type="text" name="nzona">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tcalle">Area:</label>
                                <select class="form-control" name="tcalle"  id="tcalle">
                                <option value="" selected>Seleccione una opción</option>
                                    @foreach($area as $combo)
                                      <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ncalle">Nombre de Area</label>
                                <input class="form-control text-uppercase" type="text" name="ncalle">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tvivienda">Hogar:</label>
                                <select class="form-control" name="tvivienda"  id="tvivienda">
                                <option value="" selected>Seleccione una opción</option>
                                    @foreach($hogar as $combo)
                                      <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nvivienda">Nombre Hogar:</label>
                                <input class="form-control text-uppercase" type="text" name="nvivienda">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Carga Familiar</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                          <label for="nombrescf"> Nombres:</label>
                          <input id="nombrescf" class="form-control text-uppercase" type="text" name="nombrescf">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="apellidoscf">Apellidos:</label>
                          <input id="apellidoscf" class="form-control text-uppercase" type="text" name="apellidoscf">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                          <label for="cedulacf">Cedula:</label>
                          <input id="cedulacf" class="form-control" type="text" name="cedulacf">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fecha">Fecha:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                                </div>
                                <input type="text" class="form-control float-right datepicker" name="fechacf" id="fechacf" autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
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

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="float-right">
                                <button id="btnAgregarFamiliar" class="btn btn-success" type="button">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-hover ">
                              <thead class="bg-info">
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
                </div>

                <div class="card-footer">
                    <div class="float-right">
                        <a href="{{ url('/personas') }}" type="button" class="btn btn-danger">Cancelar</a>
                        <button class="btn btn-primary" type="submit" id="registrar">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@stop
@section('footer')
<div></div>
@stop
@section('js')
<script>

$('.datepicker').datepicker({
      format: "yyyy-mm-dd",
      clearBtn: true,
      language: "es",
      orientation: "bottom auto",
      changeYear: false,
      endDate: new Date()
    });

    /*$('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')

    });

    $('#btnYes').click(function() {
        $('#facturaForm').submit();
    });*/

$(document).ready(function() {

    $('#btnAgregarFamiliar').on('click', function() {
      accionAgregarFamiliar();
    })

    accionAgregarFamiliar = function () {
        var id = ++$("input[name='personaTemp[]']").length
        let nombres = $('#nombrescf').val()
        let apellidos = $('#apellidoscf').val()
        let cedula = $('#cedulacf').val()
        let fecha = $('#fechacf').val()
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
        console.log(data);
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
       $('#alert').html('Debe cargar toda la información de la carga familiar');
       $('#alert').fadeIn();
       setTimeout(function(){ $('#alert').fadeOut(); }, 3000);
    }

//limpia los input despues de insertar
$('#nombrescf').val('');
$('#apellidoscf').val('');
$('#cedulacf').val('');
$('#fechacf').val('');
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
        url: "{{ url('/municipioAjaxUser') }}",
        data: {entidad_id: $('#entidad_id').val(), '_token': $('input[name=_token]').val()},
        success: function (response) {
            $('#municipio_id').html(response);
            $('#cuidad_id').empty();
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
            url: "{{ url('/parroquiaAjaxUser') }}",
            data: {municipio_id: $('#municipio_id').val(), '_token': $('input[name=_token]').val()},
            success: function (response) {
            $('#parroquia_id').html(response);

        },
        beforeSend: function () {
        $('#parroquia_id').append('<option value="" selected>Buscando...</option>');
        }
    });

});

$('.estado').change(function ()
{
    $.ajax({
        method: "POST",
        url: "{{ url('/ciudadAjaxUser') }}",
        data: {entidad_id: $('#entidad_id').val(), '_token': $('input[name=_token]').val()},
        success: function (response) {
            $('#ciudad_id').html(response);

        },
        beforeSend: function () {
            $('#ciudad_id').append('<option value="" selected>Buscando...</option>');
        }
    });

});
    </script>
@stop

