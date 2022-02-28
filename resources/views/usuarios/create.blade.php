@extends('adminlte::page')
@section('content')

    <div class="row">
        <div class="col-12">
            <form action="{{ url('/usuario') }}" method="POST" role="form" data-toggle="validator" class="form"
                  id="userForm" name="userForm">
                {{ csrf_field() }}

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos Personales</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="">C&eacute;dula:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" maxlength="9" name="cedula">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="">Correo Electr&oacute;nico:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input class="form-control text-lowercase" type="text" name="correo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="">Nombres:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input type="text" class="form-control text-uppercase" name="nombres">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="">Apellidos:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" name="apellidos">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="">Tel&eacute;fono Local:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input class="form-control mask_tlf" type="text" name="telefono_local">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="">Tel&eacute;fono M&oacute;vil:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input class="form-control mask_tlf" type="text" name="telefono_movil">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-3" id="divEntidad">
                                <div class="form-group">
                                    <label for="estado_id">Entidad</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                        </div>
                                        <select class="form-control estado" name="estado_id" id="entidad_id">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach($entidad as $combo)
                                                <option value="{{ $combo->id }}">{{ $combo->estado }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3" id="divciudad">
                                <div class="form-group">
                                    <label for="ciudad_id">Ciudad</label>
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
                            <div class="col-sm-12 col-md-3" id="divMunicipio">
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
                            <div class="col-sm-12 col-md-3" id="divParroquia">
                                <div class="form-group">
                                    <label for="parroquia_id">Parroquia</label>
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
                                    <label for="urbanizacion">Urbanizaci&oacute;n</label>
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
                                    <label for="tzona">Zona</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                        </div>
                                        <select class="form-control" name="tzona" id="tzona">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach($zonas as $combo)
                                                <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                        </div>
                                        <select class="form-control" name="tcalle" id="tcalle">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach($area as $combo)
                                                <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        </div>
                                        <select class="form-control" name="tvivienda" id="tvivienda">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach($hogar as $combo)
                                                <option value="{{ $combo->id }}">{{ $combo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                        @foreach($roles as $items)
                                            <option
                                                value="{{ $items->name }}">{{ (($items->name == 'super-admin') ? 'ADMINISTRADOR DEL SISTEMA' : $items->name ) }}</option>
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
                                           onkeyup="validaClave()" title="Máximo 15 dígitos."/>
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
                                    <input type="password" class="form-control" id="confirm_password"
                                           name="confirm_password"/>
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
                                <button type="button" onclick="verificarIgualdad();" class="btn btn-sm btn-primary"
                                        id="setPass">Aceptar
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

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UserCreateRequest', '#userForm') !!}

    <script>
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

        function checkStrength(password) {
            var strength = 0
            if (password.length < 6) {
                $('#result').removeClass()
                $('#result').addClass('short')
                $('#setPass').prop('disabled', true);
                $('#password').addClass('is-invalid');
                return '<font color="red"><b>Contraseña muy corta</b></font>'
            }
            if (password.length > 7) strength += 1
            // If password contains both lower and uppercase characters, increase strength value.
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
            // If it has numbers and characters, increase strength value.
            if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
            // If it has one special character, increase strength value.
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
            // If it has two special characters, increase strength value.
            if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
            // Calculated strength value, we can return messages
            // If value is less than 2
            if (strength < 2) {
                $('#result').removeClass()
                $('#result').addClass('weak')
                $('#setPass').prop('disabled', true);
                $('#password').addClass('is-invalid');
                return '<font color="orange"><b>Contraseña débil</b></font>'
            } else if (strength == 2) {
                $('#result').removeClass()
                $('#result').addClass('good')
                $('#setPass').prop('disabled', true);
                $('#password').addClass('is-invalid');
                return '<font color="blue"><b>Contraseña buena</b></font>'
            } else {
                $('#result').removeClass()
                $('#result').addClass('strong')
                $('#password').removeClass('is-invalid');
                $('#setPass').prop('disabled', false);
                return '<font color="green"><b>Contraseña fuerte</b></font>'
            }
        }

        $(function () {
            $('[data-toggle="popover"]').popover(
                {
                    container: 'body'
                })
        })

        function validaClave()
        {
            valor =  $("#password").val();
            longitud = $("#password").val().length;
            if(longitud > 15)
            {
                valor = valor.toString();
                valor =valor.slice (0, 15);
                $("#password").val(valor);
                $('#message').html("@lang('message.longitudClave')");
                $('#msj').show();
                desvanecer();
            }
        }

        function verificarIgualdad(){
            var password      = $("#password").val();
            var passwordNuevo = $("#confirm_password").val();

            if(password == passwordNuevo){
                $("#mensajeIogualdadPass").html("");
                $("#usuarioForm").submit();
            }else{
                $("#mensajeIogualdadPass").html("Los campos de nueva contraseña y confirmación no coinciden");
            }

        }
    </script>
@stop
