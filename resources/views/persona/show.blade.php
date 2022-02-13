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
        <div id="sinResultados" role="alert">
        </div>
        @elseif ($search != 'v' && $data->isEmpty())
        <div id="sinResultados" role="alert">
        </div>
        @endif--}}
        <form action="{{ route('personas.store') }}" class="form" data-toggle="validator" id="personaForm" method="POST" name="personaForm" role="form">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Datos Personales
                    </h3>
                    <button class="btn btn-primary btn-sm float-right mx-1">
                        Editar
                    </button>
                    <button class="btn btn-danger btn-sm float-right">
                        Eliminar
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
                                {{ $persona->nombres }}
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <b>
                                Apellidos:
                            </b>
                            <span class="text-uppercase">
                                {{ $persona->apellidos }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <b>
                                Fecha:
                            </b>
                            <span>
                                {{ $persona->fecha}}
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <b>
                                Lugar de Nacimiento:
                            </b>
                            <span>
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
                            <span>
                                {{ $persona->estado }}
                            </span>
                        </div>
                        <div class="form-group col-6">
                            <b>
                                Ciudad:
                            </b>
                            <span>
                                {{ $persona->ciudad }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6 col-md-6">
                            <b>
                                Municipio:
                            </b>
                            <span>
                                {{ $persona->municipio}}
                            </span>
                        </div>
                        <div class="form-group col-6 col-md-6">
                            <b>
                                Parroquia:
                            </b>
                            <span>
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
                    <h3 class="card-title">
                        Carga Familiar
                    </h3>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carga_familiar as $items)
                                    <tr class="text-center">
                                        <td>
                                            {{ $items->num }}
                                        </td>
                                        <td class="text-uppercase">
                                            {{ $items->nombres . ' ' . $items->apellidos }}
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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <a class="btn btn-danger" href="{{ url('/personas') }}" type="button">
                            Cancelar
                        </a>
                        {{--
                        <button class="btn btn-primary" id="registrar" type="submit">
                            Enviar
                        </button>
                        --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-12 col-md-3">
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
@stop
@section('footer')
<div>
</div>
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
