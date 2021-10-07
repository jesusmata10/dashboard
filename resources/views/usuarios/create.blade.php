@extends('adminlte::page')
@section('content')

<div class="row">
    <div class="col-12">
    	 <form action="{{ url('/usuario') }}" method="POST" role="form" data-toggle="validator" class="form" id="usuarioForm" name="usuarioForm">
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
                                @foreach($entidad as $combo)
                                  <option value="{{ $combo->id }}">{{ $combo->nombre_entidad }}</option>
                                @endforeach
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
                                    @foreach($entidad as $combo)
                                      <option value="{{ $combo->id }}">{{ $combo->nombre_entidad }}</option>
                                    @endforeach
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
                                    @foreach($entidad as $combo)
                                      <option value="{{ $combo->id }}">{{ $combo->nombre_entidad }}</option>
                                    @endforeach
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
                                    @foreach($entidad as $combo)
                                      <option value="{{ $combo->id }}">{{ $combo->nombre_entidad }}</option>
                                    @endforeach
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
                    <h3 class="card-title">Datos del Usuario</h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Nombre Usuario:</label>
                            <input type="text" class="form-control text-lowercase" name="name">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Rol:</label>
                            <select class="form-control" name="rol">
                                <option value="">Seleccione una opci&oacute;n</option>
                                @foreach($roles as $items)
                                    <option value="{{ $items->name }}">{{ (($items->name == 'super-admin') ? 'ADMINISTRADOR DEL SISTEMA' : $items->name ) }}</option>
                                @endforeach
                            </select>
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
                              <input type="password" class="form-control" id="confirm_password" name="confirm_password"/>
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
                            <div id="mensajeIogualdadPass" style="color: #dc3545; font-size:13px;" ></div>
                            <div id="result"></div>
                         </div>
                        <br>

                    </div>

                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="button" onclick="verificarIgualdad();" class="btn btn-outline-primary" id="setPass">Aceptar</button>
                            <a href="{{ url('/usuario') }}" type="button" class="btn btn-outline-danger">Cancelar</a>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>


    $('#entidad_id').change(function ()
            {
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
</script>
@section('footer')
<div></div>
@endsection

@endsection