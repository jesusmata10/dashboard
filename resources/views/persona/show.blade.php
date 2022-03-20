@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-9">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Datos Personales
                </h3>
                <button class="btn btn-primary btn-sm float-right mx-1">
                    Editar
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6 col-md-6">
                        <b>
                            Cédula:
                        </b>
                        <span>
                            {{ $persona->cedula }}
                        </span>
                    </div>
                    <div class="form-group col-6 col-md-6">
                        <b class="text-uppercase">
                            Rif:
                        </b>
                        <span>
                            {{ $persona->rif }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <b>
                            Nombres:
                        </b>
                        <span class="text-uppercase">
                            {{ $persona->primer_nombre }} {{ $persona->segundo_nombre }}
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <b>
                            Apellidos:
                        </b>
                        <span class="text-uppercase">
                            {{ $persona->primer_apellido }} {{ $persona->segundo_apellido }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <b>
                            Fecha:
                        </b>
                        <span>
                            {{ \Illuminate\Support\Carbon::parse($persona->fecha)->format('d-m-Y') }}
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <b>
                            Lugar de Nacimiento:
                        </b>
                        <span class="text-uppercase">
                            {{ $persona->lugarnac}}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <b>
                            Nacionalidad:
                        </b>
                        <span class="text-uppercase">
                            {{ $persona->nacionalidad }}
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <b>
                            Correo Electrónico:
                        </b>
                        <span>
                            {{ $persona->correo }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <b>
                            Teléfono Local:
                        </b>
                        <span>
                            {{ $persona->telefono_fijo }}
                        </span>
                    </div>
                    <div class="form-group col-6">
                        <b>
                            Teléfono Móvil:
                        </b>
                        <span>
                            {{ $persona->celular }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <b>
                            Estado:
                        </b>
                        <span class="text-uppercase">
                            {{ $persona->estado }}
                        </span>
                    </div>
                    <div class="form-group col-6">
                        <b>
                            Ciudad:
                        </b>
                        <span class="text-uppercase">
                            {{ $persona->ciudad }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6 col-md-6">
                        <b>
                            Municipio:
                        </b>
                        <span class="text-uppercase">
                            {{ $persona->municipio}}
                        </span>
                    </div>
                    <div class="form-group col-6 col-md-6">
                        <b>
                            Parroquia:
                        </b>
                        <span class="text-uppercase">
                            {{ $persona->parroquia}}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <b>Dirección: </b>
                        <span>
                            {{ $persona->urbanizacion .', '. $persona->zona .' '. $persona->nzona .', '. $persona->calle .' '. $persona->ncalle .', '. $persona->vivienda .' '. $persona->nvivienda }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class=" col-sm-12 col-md-6">
                        <h3 class="card-title">Carga Familiar</h3>
                    </div>
                    <div class=" col-sm-12 col-md-6">
                        {{--<button type="button" onClick="modal()" class="btn btn-sm btn-danger float-right"></button>--}}
                        <button type="button" title="Agregar" data-toggle="modal" data-target="#modal-xl" class="btn btn-sm btn-success float-right">Agregar</i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover ">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">
                                        N°
                                    </th>
                                    <th class="text-center">
                                        Nombres y Apellidos
                                    </th>
                                    <th class="text-center">
                                        Cedula
                                    </th>
                                    <th class="text-center">
                                        Fecha
                                    </th>
                                    <th class="text-center">
                                        Parentesco
                                    </th>
                                    <th class="text-center">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carga_familiar as $items)
                                    <tr class="text-center">
                                        <td>
                                            {{ $items->num }}
                                        </td>
                                        <td class="text-uppercase">
                                            {{ $items->primer_nombre . ' ' . $items->primer_apellido }}
                                        </td>
                                        <td>
                                            {{ $items->cedula}}
                                        </td>
                                        <td>
                                            {{ $items->fecha }}
                                        </td>
                                        <td class="text-uppercase">
                                            {{ $items->parentesco}}
                                        </td>
                                        <td class="">
                                            <a href="{{ url('/personas/'.encrypt($items->id).'/edit') }}" title="Editar" type="button" class="btn btn-sm btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ url('/personas/'.encrypt($items->id)) }}" title="Eliminar" type="button" class="btn btn-sm btn-danger"><i class="fas fa-eraser"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <a class="btn btn-sm btn-danger" href="{{ url('/personas') }}" type="button">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <!-- Carnet -->
        <div class="card bg-gradient-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    Información
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Carnet Patria
                </p>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nzona">
                            Serial:
                        </label>
                        <input class="form-control text-uppercase" name="serial" readonly="" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="nzona">
                            Codigo:
                        </label>
                        <input class="form-control text-uppercase" name="codigo" readonly="" type="text">
                        </input>
                    </div>
                </div>
            </div>
        </div>
        <!-- Salud -->
        <div class="card bg-gradient-success">
            <div class="card-header">
                <h3 class="card-title">
                    Información
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Salud
                </p>
            </div>
        </div>
        <!-- Gas -->
        <div class="card bg-gradient-info">
            <div class="card-header">
                <h3 class="card-title">
                    Información
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Gas
                </p>
            </div>
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Carga Familiar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ url('personaFamilia') }}" method="POST" role="form" data-toggle="validator" class="form" id="personaForm" name="personaForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="personas_id" value="{{ $persona->id }}">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Datos Personales</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="">C&eacute;dula:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" maxlength="9" name="cedula">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="correo">Correo Electr&oacute;nico:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input class="form-control text-lowercase" type="text" name="correo">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="rif">Rif:</label>
                                    <input class="form-control text-uppercase" type="text" name="rif" value="{{ isset($carga_familiar->rif) ? $carga_familiar->rif : '' }}">
                                </div>
                            </div>

                            <div class=" row">
                                <div class="form-group col-md-3">
                                    <label for="primer_nombre">(*) Primer Nombre:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input id="primer_nombre" class="form-control text-uppercase" type="text" name="primer_nombre" value="{{ isset($carga_familiar->primer_nombre) ? $carga_familiar->primer_nombre : '' }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="segundo_nombre">Segundo Nombre:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input id="segundo_nombre" class="form-control text-uppercase" type="text" name="segundo_nombre" value="{{ isset($carga_familiar->segundo_nombre) ? $carga_familiar->segundo_nombre : '' }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="primer_apellido">(*) Primer Apellido:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input id="primer_apellido" class="form-control text-uppercase" type="text" name="primer_apellido" value="{{ isset($carga_familiar->primer_apellido) ? $carga_familiar->primer_apellido : '' }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="segundo_apellido">Segundo Apellido:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input id="segundo_apellido" class="form-control text-uppercase" type="text" name="segundo_apellido" value="{{ isset($carga_familiar->segundo_apellido) ? $carga_familiar->segundo_apellido : '' }}">
                                    </div>
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
                                        <input type="text" style="position: relative; z-index: 9999;" class="form-control float-right datepicker" name="fecha" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lugarnac">Lugar de Nacimiento:</label>
                                    <input class="form-control text-uppercase" type="text" name="lugarnac" value="{{ isset($carga_familiar->lugarnac) ? $carga_familiar->lugarnac : '' }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nacionalidad">Nacionalidad:</label>
                                    <input class="form-control text-uppercase" type="text" name="nacionalidad">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="parentesco">Parentesco:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <select class="form-control" name="parentesco" id="parentesco">
                                            <option value="" selected>Seleccione una opci&oacute;n</option>
                                            <option value="Madre">Madre</option>
                                            <option value="Padre">Padre</option>
                                            <option value="Hijo">Hijo</option>
                                            <option value="Hija">Hija</option>
                                            <option value="Suegro">Suegro</option>
                                            <option value="Suegra">Suegra</option>
                                            <option value="Sobrina">Sobrina</option>
                                            <option value="Sobrino">Sobrino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="telefono_fijo">Tel&eacute;fono Local:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input class="form-control mask_tlf" type="text" name="telefono_fijo">
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="celular">Tel&eacute;fono M&oacute;vil:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input class="form-control mask_tlf" type="text" name="celular" value="{{isset($persona->celular) ? $persona->celular : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Carnet Patria</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="nzona">Serial:</label>
                                    <input class="form-control text-uppercase" type="text" name="serial" value="{{isset($carga_familiar->serial) ? $carga_familiar->serial : ''}}">
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="nzona">Codigo:</label>
                                    <input class="form-control text-uppercase" type="text" name="codigo" value="{{isset($carga_familiar->codigo) ? $carga_familiar->codigo : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button class="btn btn-sm btn-primary" type="submit" id="registrar"><i class="fas fa-save"></i> Guardar
                                </button></i></a>
                                <a href="{{'/personas'}}" type="button" class="btn btn-danger btn-sm float-right">Cancelar <i class="fa fa-minus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
<div>
</div>
@stop
@section('js')

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\StoreFamilia', '#personaForm') !!}

<script>
    $('.datepicker').datepicker({
        format: "dd-mm-yyyy",
        clearBtn: true,
        language: "es",
        orientation: "bottom auto",
        changeYear: false,
        endDate: new Date()
    })

    /*function modal(item) {
        let datatable = {{--!! $report !!--}}
        const result = datatable.filter(datatable => datatable.id === item)

        $('input[name=mo_cedula]').val(result[0].cedula)
        $('input[name=mo_nombres]').val(result[0].nombres)
        $('input[name=mo_apellidos]').val(result[0].apellidos)
        $('input[name=mo_celular]').val(result[0].celular)
        $('input[name=mo_serial]').val(result[0].serial)
        $('input[name=mo_codigo]').val(result[0].codigo)

        $('#modal-xl').modal('show');
    }*/

    setTimeout(function() {
        $(".desva").fadeOut(6000)
    }, 12000)

    function validar() {
        var select = $('#form select').length
        var text = $('#form input[type=text]').length

        var i = 1
        var flag = false

        if (select > 0) {
            $.each($('#form select'), function() {
                if ($(this).val() == '') {
                    if (i == select) {
                        flag = false
                        i = 1
                    } else {
                        i++
                    }
                } else {
                    flag = true
                }
            })
        }

        if (text > 0 && !flag) {
            $.each($('#form input[type=text]'), function() {
                if ($(this).val() == '') {
                    if (i == text) {
                        flag = false
                    }
                    i++
                } else {
                    flag = true
                }
            })
        }

        if (!flag) {

            toastr.error("Debe seleccionar un criterio de b&uacute;squeda");

        } else {
            $("#form").submit()
        }

    }

    $(document).ready(function() {
        $('#entidad_id').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('/municipioAjaxUser') }}",
                data: {
                    entidad_id: $('#entidad_id').val(),
                    '_token': $('input[name=_token]').val()
                },
                success: function(response) {
                    $('#municipio_id').html(response);
                    $('#cuidad_id').empty();
                    $("#parroquia_id").empty();
                    $('#parroquia_id').append('<option value="" selected>Seleccione una opción</option>');

                },
                beforeSend: function() {
                    $('#municipio_id').append('<option value="" selected>Buscando...</option>');
                }
            });
        });

        $('#municipio_id').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('/parroquiaAjaxUser') }}",
                data: {
                    municipio_id: $('#municipio_id').val(),
                    '_token': $('input[name=_token]').val()
                },
                success: function(response) {
                    $('#parroquia_id').html(response);

                },
                beforeSend: function() {
                    $('#parroquia_id').append('<option value="" selected>Buscando...</option>');
                }
            });

        });

        $('.estado').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('/ciudadAjaxUser') }}",
                data: {
                    entidad_id: $('#entidad_id').val(),
                    '_token': $('input[name=_token]').val()
                },
                success: function(response) {
                    $('#ciudad_id').html(response);

                },
                beforeSend: function() {
                    $('#ciudad_id').append('<option value="" selected>Buscando...</option>');
                }
            });

        });
</script>
@endsection
