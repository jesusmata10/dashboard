@extends('adminlte::page')
@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-9">

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
                        <button class="btn btn-primary btn-sm float-right mx-1">Editar</button>
                        <button class="btn btn-danger btn-sm float-right">Eliminar</button>
                    </div>

                    <div class="card-body">
                    
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="">C&eacute;dula:</label>
                                <input type="text" class="form-control" maxlength="9" name="cedula" value="{{ $persona->cedula }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="correo">Correo Electr&oacute;nico:</label>
                                <input class="form-control text-lowercase" type="text" name="correo" value="{{ $persona->correo }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rif">Rif:</label>
                                <input class="form-control text-uppercase" type="text" name="rif" value="{{ $persona->rif }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nombres">Nombres:</label>
                                <input type="text" class="form-control text-uppercase" name="nombres" value="{{ $persona->nombres}}"readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="apellidos">Apellidos:</label>
                                <input class="form-control text-uppercase" type="text" name="apellidos" value="{{ $persona->apellidos }}" readonly>
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
                                    <input type="text" class="form-control float-right datepicker" name="fecha" autocomplete="off" value="{{ $persona->fecha}}" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lugarnac">Lugar de Nacimiento:</label>
                                <input class="form-control text-uppercase" type="text" name="lugarnac" value="{{ $persona->lugarnac}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nacionalidad">Nacionalidad:</label>
                                <input class="form-control text-uppercase" type="text" name="nacionalidad" value="{{ $persona->nacionalidad }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="telefono_fijo">Tel&eacute;fono Local:</label>
                                <input class="form-control mask_tlf" type="text" name="telefono_fijo" value="{{ $persona->telefono_fijo }}" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="celular">Tel&eacute;fono M&oacute;vil:</label>
                                <input class="form-control mask_tlf" type="text" name="celular" value="{{ $persona->celular }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" name="direccion">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3" id="divEntidad" >
                                <div class="form-group">
                                    <label for="estado_id">Entidad</label>
                                    <input type="text" name="" id="" value="" >
                                   
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
                        
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover ">
                                    <thead class="bg-info">
                                    <tr>
                                        <th class="text-center">N°</th>
                                        <th class="text-center">Nombres y Apellidos</th>
                                        <th class="text-center">Cedula</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Parentesco</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($carga_familiar as $items)
                                            <tr class="text-center">
                                                <td>{{ $items->id }}</td>
                                                <td class="text-uppercase">{{ $items->nombres . ' ' . $items->apellidos }}</td>
                                                <td>{{ $items->cedula}}</td>
                                                <td>{{ $items->fecha }}</td>
                                                <td class="text-uppercase">{{ $items->parentezco}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{ url('/personas') }}" type="button" class="btn btn-danger">Cancelar</a>
                            {{--<button class="btn btn-primary" type="submit" id="registrar">Enviar</button>--}}
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-12 col-md-3">
            <div class="card bg-gradient-secondary">
                <div class="card-header">
                    <h3 class="card-title">Información</h3>
                </div>

                <div class="card-body">
                    <p>Carnet Patria</p>
                     <div class="col-md-12">
                        <div class="form-group">
                            <label for="nzona">Serial:</label>
                            <input class="form-control text-uppercase" type="text" name="serial" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nzona">Codigo:</label>
                            <input class="form-control text-uppercase" type="text" name="codigo" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-gradient-success">
                <div class="card-header">
                    <h3 class="card-title">Información</h3>
                </div>

                <div class="card-body">
                    <p>Salud</p>
                </div>
            </div>
            <div class="card bg-gradient-info">
                <div class="card-header">
                    <h3 class="card-title">Información</h3>
                </div>

                <div class="card-body">
                    <p>Gas</p>
                </div>
            </div>
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

        $(document).ready(function() {


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
