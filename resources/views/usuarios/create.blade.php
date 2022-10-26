@extends('adminlte::page')
@section('content')

    <div class="row">
        <div class="col-12">
            <form action="{{ url('/usuario') }}" method="POST" role="form" data-toggle="validator" class="form"
                id="usuarioForm" name="usuarioForm">
                {{ csrf_field() }}

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos Personales</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="cedula">(*) C&eacutedula:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" maxlength="10" name="cedula">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="email">(*) Correo Electr&oacutenico:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input class="form-control text-lowercase" type="text" name="email">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="rif">Rif:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-registered"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase mask_rif" type="text" name="rif" maxlength="12">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="primer_nombre">(*) Primer Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="primer_nombre" class="form-control text-uppercase" type="text"
                                        name="primer_nombre">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="segundo_nombre">Segundo Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="segundo_nombre" class="form-control text-uppercase" type="text"
                                        name="segundo_nombre">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="primer_apellido">(*) Primer Apellido:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="primer_apellido" class="form-control text-uppercase" type="text"
                                        name="primer_apellido">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="segundo_apellido">Segundo Apellido:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="segundo_apellido" class="form-control text-uppercase" type="text"
                                        name="segundo_apellido">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="fecha">(*) Fecha:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right datepicker" name="fecha"
                                        autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="lugarnac">(*) Lugar de Nacimiento:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" name="lugarnac">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nacionalidad">(*) Nacionalidad:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" name="nacionalidad">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sexo">(*) Sexo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                    </div>
                                    <select class="form-control" name="sexo" id="sexo">
                                        <option value="" selected>Seleccione una opci&oacute;n</option>
                                        <option value="M">Mujer</option>
                                        <option value="H">Hombre</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
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
                                <label for="celular">(*) Tel&eacute;fono M&oacute;vil:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input class="form-control mask_tlf" type="text" name="celular">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="parentesco">Parentesco:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                    </div>
                                    <select class="form-control" name="parentesco" id="parentesco">
                                        <option value="" selected>Seleccione una opci&oacute;n</option>
                                        <option value="Jefe de Hogar">Jefe de Hogar</option>
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
                        </div>

                        <div class="row">
                            <div class="col-md-3" id="divEntidad">
                                <div class="form-group">
                                    <label for="estado_id">(*) Entidad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                        </div>
                                        <select class="form-control estado" name="estado_id" id="entidad_id">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach ($entidad as $combo)
                                                <option value="{{ $combo->id }}">{{ $combo->estado }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="divciudad">
                                <div class="form-group">
                                    <label for="ciudad_id">(*) Ciudad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <select class="form-control" name="ciudad_id" id="ciudad_id">
                                            <option value="" selected>Seleccione una opción</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="divMunicipio">
                                <div class="form-group">
                                    <label for="municipio_id">(*) Municipio</label>
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
                                    <label for="parroquia_id">(*) Parroquia</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
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
                                    <label for="urbanizacion">(*) Urbanizaci&oacute;n</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        </div>
                                        <input class="form-control text-uppercase" type="text" name="urbanizacion">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tzona">(*) Zona</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <select class="form-control" name="tzona" id="tzona">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach ($zonas as $combo)
                                                <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nzona">(*) Nombre de zona</label>
                                    <input class="form-control text-uppercase" type="text" name="nzona">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tcalle">(*) Area:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                        </div>
                                        <select class="form-control" name="tcalle" id="tcalle">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach ($area as $combo)
                                                <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ncalle">(*) Nombre de Area</label>
                                    <input class="form-control text-uppercase" type="text" name="ncalle">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tvivienda">(*) Hogar:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        </div>
                                        <select class="form-control" name="tvivienda" id="tvivienda">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach ($hogar as $combo)
                                                <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nvivienda">(*) Nombre Hogar:</label>
                                    <input class="form-control text-uppercase" type="text" name="nvivienda">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Usuario</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Nombre Usuario:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control text-lowercase" name="name">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Rol:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    </div>
                                    <select class="form-control" name="rol">
                                        <option value="">Seleccione una opci&oacute;n</option>
                                        @foreach ($roles as $items)
                                            <option value="{{ $items->id }}">{{ $items->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="password">Nueva Contraseña:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-key"></i> </span>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password"
                                        onkeyup="validaClave()" title="Máximo 15 dígitos." />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-exclamation-circle" style="color:red;" data-placement="right"
                                                data-toggle="popover" title="Nueva contraseña"
                                                data-content="Ingrese una combinación de al menos seis (6) y hasta quince (15 ) dígitos que incluya números, letras mayúsculas y minúsculas  y/ o caracteres especiales.">
                                            </i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="confirm_password">Confirmar Contraseña:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-key"></i> </span>
                                    </div>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-exclamation-circle" style="color:red;" data-placement="right"
                                                data-toggle="popover" title="Confirmar contraseña"
                                                data-content="Confirme su nueva contraseña.">
                                            </i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div id="mensajeIogualdadPass" style="color: #dc3545; font-size:13px;"></div>
                                <div id="result"></div>
                            </div>
                            <br>
                        </div>

                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-sm btn-primary" id="setPass">Aceptar
                                </button>
                                <a href="{{ url('/usuario') }}" type="button"
                                    class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
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

    {{-- <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UserCreateRequest', '#usuarioForm') !!} --}}

    <script>
        $(document).ready(function() {
            $('.mask_tlf').inputmask("(9999) 999-99-99")
            $('.mask_rif').inputmask("99999999-9")
        });

        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            clearBtn: true,
            language: "es",
            orientation: "bottom auto",
            changeYear: false,
            endDate: new Date()
        });

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
                    $("#parroquia_id").empty();
                    $('#parroquia_id').append(
                        '<option value="" selected>Seleccione una opción</option>');

                },
                beforeSend: function() {
                    $('#municipio_id').append('<option value="" selected>Buscando...</option>');
                }
            });
        });

        $('#entidad_id').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('/ciudadAjaxUser') }}",
                data: {
                    entidad_id: $('#entidad_id').val(),
                    '_token': $('input[name=_token]').val()
                },
                success: function(response) {
                    $('#ciudad_id').html(response);
                    /*$('#municipio_id').empty();
                    $('#municipio_id').append('<option value="" selected>Seleccione una opción</option>');*/
                },
                beforeSend: function() {
                    $('#ciudad_id').append('<option value="" selected>Buscando...</option>');
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
    </script>

@stop
