@extends('adminlte::page')
@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-12">

            <form action="{{-- route('personas.store') --}}" method="POST" role="form" data-toggle="validator"
                  class="form" id="personaForm" name="personaForm">
                {{ csrf_field() }}

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
                                    <input type="text" class="form-control" maxlength="9" name="cedula" value="{{ isset($persona->cedula) ? $persona->cedula : '' }}" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Correo Electr&oacute;nico:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input class="form-control text-lowercase" type="text" name="email" value="{{ isset($persona->email) ? $persona->email : '' }}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rif">Rif:</label>
                                <input class="form-control text-uppercase" type="text" name="rif" value="{{ isset($persona->rif) ? $persona->rif : '' }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="primer_nombre">(*) Primer Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="primer_nombre" class="form-control text-uppercase" type="text" name="primer_nombre" value="{{ isset($persona->primer_nombre) ? $persona->primer_nombre : '' }}">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="segundo_nombre">Segundo Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="segundo_nombre" class="form-control text-uppercase" type="text" name="segundo_nombre" value="{{ isset($persona->segundo_nombre) ? $persona->segundo_nombre : '' }}">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="primer_apellido">(*) Primer Apellido:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="primer_apellido" class="form-control text-uppercase" type="text" name="primer_apellido" value="{{ isset($persona->primer_apellido) ? $persona->primer_apellido : '' }}">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="segundo_apellido">Segundo Apellido:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="segundo_apellido" class="form-control text-uppercase" type="text" name="segundo_apellido" value="{{ isset($persona->segundo_apellido) ? $persona->segundo_apellido : '' }}">
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
                                    <input type="text" class="form-control float-right datepicker" name="fecha"
                                           autocomplete="off" value="{{ isset($persona->fecha) ? \Illuminate\Support\Carbon::parse($persona->fecha)->format('d-m-Y') : '' }}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lugarnac">Lugar de Nacimiento:</label>
                                <input class="form-control text-uppercase" type="text" name="lugarnac"
                                       value="{{ isset($persona->lugarnac) ? $persona->lugarnac : '' }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nacionalidad">Nacionalidad:</label>
                                <input class="form-control text-uppercase" type="text" name="nacionalidad" value="{{ isset($persona->nacionalidad) ? $persona->nacionalidad : '' }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="telefono_fijo">Tel&eacute;fono Local:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input class="form-control mask_tlf" type="text" name="telefono_fijo"
                                           value="{{ isset($persona->telefono_fijo) ? $persona->telefono_fijo : '' }}">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="celular">Tel&eacute;fono M&oacute;vil:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input class="form-control mask_tlf" type="text" name="celular"
                                           value="{{ isset($persona->celular) ? $persona->celular : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3" id="divEntidad">
                                <div class="form-group">
                                    <label for="estado_id">Entidad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                        </div>
                                        <select class="form-control estado" name="estado_id" id="entidad_id">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach($entidad as $combo)
                                                @if($combo->id  == $persona->estado_id)
                                                    <option selected="selected"
                                                            value="{{ $combo->id }}">{{ $combo->estado }}</option>
                                                @else
                                                    <option value="{{ $combo->id }}">{{ $combo->estado }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="divMunicipio">
                                <div class="form-group">
                                    <label for="ciudad_id">Ciudad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <select class="form-control" name="ciudad_id" id="ciudad_id">
                                            <option value="" selected>Seleccione una opción</option>
                                            {{--@if()
                                            @else
                                                <option value="{{ $combo->id }}">{{ $combo->estado }}</option>
                                            @endif--}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="divMunicipio">
                                <div class="form-group">
                                    <label for="municipio_id">Municipio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <select class="form-control" name="municipio_id" id="municipio_id">
                                            <option value="" selected>Seleccione una opción</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="divParroquia">
                                <div class="form-group">
                                    <label for="parroquia_id">Parroquia</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <select class="form-control" name="parroquia_id" id="parroquia_id">
                                            <option value="" selected>Seleccione una opción</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="urbanizacion">Urbanizaci&oacute;n</label>
                                    <input class="form-control text-uppercase" type="text" name="urbanizacion"
                                           value="{{ isset($persona->urbanizacion) ? $persona->urbanizacion : '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tzona">Zona</label>
                                    <select class="form-control" name="tzona" id="tzona">
                                        <option value="" selected>Seleccione una opción</option>
                                        @foreach($zonas as $combo)
                                            @if($combo->id == $persona->tzona)
                                                <option selected="selected"
                                                        value="{{$combo->id}}">{{ $combo->nombre }}</option>
                                            @else
                                                <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nzona">Nombre de zona</label>
                                    <input class="form-control text-uppercase" type="text" name="nzona"
                                           value="{{isset($persona->nzona) ? $persona->nzona : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tcalle">Area:</label>
                                    <select class="form-control" name="tcalle" id="tcalle">
                                        <option value="" selected>Seleccione una opción</option>
                                        @foreach($area as $combo)
                                            @if($combo->id == $persona->tcalle)
                                                <option selected="selected"
                                                        value="{{$combo->id}}">{{$combo->nombre}}</option>
                                            @else
                                                <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ncalle">Nombre de Area</label>
                                    <input class="form-control text-uppercase" type="text" name="ncalle"
                                           value="{{isset($persona->ncalle) ? $persona->ncalle : ''}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tvivienda">Hogar:</label>
                                    <select class="form-control" name="tvivienda" id="tvivienda">
                                        <option value="" selected>Seleccione una opción</option>
                                        @foreach($hogar as $combo)
                                            @if($combo->id == $persona->tvivienda)
                                                <option selected="selected"
                                                        value="{{$combo->id}}">{{$combo->nombre}}</option>
                                            @else
                                                <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nvivienda">Nombre Hogar:</label>
                                    <input class="form-control text-uppercase" type="text" name="nvivienda"
                                           value="{{isset($persona->nvivienda) ? $persona->nvivienda : '' }}">
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
                                <input class="form-control text-uppercase" type="text" name="serial"
                                       value="{{isset($persona->serial) ? $persona->serial : ''}}">
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="nzona">Codigo:</label>
                                <input class="form-control text-uppercase" type="text" name="codigo"
                                       value="{{isset($persona->codigo) ? $persona->codigo : ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm mx-1" href="">Guardar <i class="fa fa-check-circle"></i></a>
                            <a href="{{'/personas'}}" type="button" class="btn btn-danger btn-sm float-right">Cancelar
                                <i class="fa fa-minus-circle"></i></a>
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
            format: "dd-mm-yyyy",
            clearBtn: true,
            language: "es",
            orientation: "bottom auto",
            changeYear: false,
            endDate: new Date()
        });

        $(document).ready(function () {

            $('#entidad_id').change(function () {
                $.ajax({
                    method: "POST",
                    url: "{{ url('/municipioAjaxUser') }}",
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

            $('#entidad_id').change(function () {
                $.ajax({
                    method: "POST",
                    url: "{{ url('/ciudadAjaxUser') }}",
                    data: {entidad_id: $('#entidad_id').val(), '_token': $('input[name=_token]').val()},
                    success: function (response) {
                        $('#ciudad_id').html(response);
                        /*$('#municipio_id').empty();
                        $('#municipio_id').append('<option value="" selected>Seleccione una opción</option>');*/
                    },
                    beforeSend: function () {
                        $('#ciudad_id').append('<option value="" selected>Buscando...</option>');
                    }
                });

            });

            $('#municipio_id').change(function () {
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
        })
    </script>
@stop
