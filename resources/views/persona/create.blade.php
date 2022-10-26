@extends('adminlte::page')
@section('content')
    <?php
    use Carbon\Carbon;
    ?>
    <div class="row">
        <div class="col-12">

            <form action="{{ route('personas.store') }}" method="POST" role="form" data-toggle="validator" class="form"
                id="personaForm" name="personaForm">
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
                                <label for="correo">(*) Correo Electr&oacutenico:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input class="form-control text-lowercase" type="email" name="email">
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
                            <div class="form-group col-md-4">
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
                            <div class="form-group col-md-4">
                                <label for="lugarnac">(*) Lugar de Nacimiento:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" name="lugarnac">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nacionalidad">(*) Nacionalidad:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" name="nacionalidad">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="telefono_fijo">Tel&eacute;fono Local:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input class="form-control mask_tlf" type="text" name="telefono_fijo">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="celular">(*) Tel&eacute;fono M&oacute;vil:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input class="form-control mask_tlf" type="text" name="celular">
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
                        <h3 class="card-title">Carga Familiar</h3>
                    </div>

                    <div class="card-body">
                        <div class="alert" role="alert" id="alert" style="display: none"></div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="primer_nombref">(*) Primer Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="primer_nombref" class="form-control text-uppercase" type="text"
                                        name="primer_nombref">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="segundo_nombref">Segundo Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="segundo_nombref" class="form-control text-uppercase" type="text"
                                        name="segundo_nombref">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="primer_apellidof">(*) Primer Apellido:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="primer_apellidof" class="form-control text-uppercase" type="text"
                                        name="primer_apellidof">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="segundo_apellidof">Segundo Apellido:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input id="segundo_apellidof" class="form-control text-uppercase" type="text"
                                        name="segundo_apellidof">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cedulacf">Cedula:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input id="cedulacf" class="form-control text-uppercase" type="text"
                                        name="cedulacf">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="fecha">Fecha:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right datepicker" name="fechacf"
                                        id="fechacf" autocomplete="off" readonly>
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
                            <div class="form-group col-md-4">
                                <label for="lugarnacf">(*) Lugar de Nacimiento:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" name="lugarnacf"
                                        id="lugarnacf">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nacionalidadf">(*) Nacionalidad:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" name="nacionalidadf"
                                        id="nacionalidadf">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="form-group col-12">
                                <div class="float-right">
                                    <button id="btnAgregarFamiliar" class="btn btn-sm btn-success" type="button"><i
                                            class="fas fa-plus"></i> Agregar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover ">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>Primer Nombre</th>
                                            <th>Segundo Nombre</th>
                                            <th>Primer Apellidos</th>
                                            <th>Segundo Apellidos</th>
                                            <th>Cedula</th>
                                            <th>Fecha</th>
                                            <th>Parentesco</th>
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
                            <button class="btn btn-sm btn-primary" type="submit" id="registrar"><i
                                    class="fas fa-save"></i> Enviar
                            </button>
                            <a href="{{ url('/personas') }}" type="button" class="btn btn-sm btn-danger"><i
                                    class="fas fa-arrow-left"></i> Cancelar</a>
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

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\PersonasRequest', '#personaForm') !!}

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

        $(document).ready(function() {

            $('#btnAgregarFamiliar').on('click', function() {
                accionAgregarFamiliar();
            })
            accionAgregarFamiliar = function() {
                var id = ++$("input[name='personaTemp[]']").length
                let primer_nombre = $('#primer_nombref').val()
                let segundo_nombre = $('#segundo_nombref').val()
                let primer_apellido = $('#primer_apellidof').val()
                let segundo_apellido = $('#segundo_apellidof').val()
                let cedula = $('#cedulacf').val()
                let fecha = $('#fechacf').val()
                let parentesco = $('#parentesco').val()
                let parentescotxt = $('#parentesco option:selected').text()
                let lugarnac = $('#lugarnacf').val()
                let nacionalidad = $('#nacionalidadf').val()

                let data = {
                    id: id,
                    primer_nombre: primer_nombre,
                    segundo_nombre: segundo_nombre,
                    primer_apellido: primer_apellido,
                    segundo_apellido: segundo_apellido,
                    cedula: cedula,
                    fecha: fecha,
                    parentesco: parentesco,
                    parentescotxt: parentescotxt,
                    lugarnac: lugarnac,
                    nacionalidad: nacionalidad
                }
                console.log(data);
                let accion = JSON.stringify(data)
                if (primer_nombre !== '' && primer_apellido !== '' && fecha !== '' && parentesco !== '') {
                    $('#mytable').append(`

            <tr id="row${id}">
                <td style="display: none">
                    <input type="hidden" name="personaTemp[]" value='${accion}' />
                </td>
                <td class="text-uppercase">${primer_nombre}</td>
                <td class="text-uppercase">${segundo_nombre}</td>
                <td class="text-uppercase">${primer_apellido}</td>
                <td class="text-uppercase">${segundo_apellido}</td>
                <td class="text-uppercase">${cedula}</td>
                <td class="text-uppercase">${fecha}</td>
                <td class="text-uppercase">${parentescotxt}</td>
                <td>
                    <button type="button" class="btn btn-danger" onclick='eliminarFamiliar(${id})'>
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>

        `);

                } else {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    toastr.error("Debe cargar toda la información de la carga familiar");
                }

                //limpia los input despues de insertar
                $('#primer_nombref').val('');
                $('#segundo_nombref').val('');
                $('#primer_apellidof').val('');
                $('#segundo_apellidof').val('');
                $('#cedulacf').val('');
                $('#fechacf').val('');
                $('#parentesco').val('');
                $('#lugarnacf').val('');
                $('#nacionalidadf').val('');

            }

            //elimina el registro selecionado
            eliminarFamiliar = function(id) {
                $('#row' + id).remove();
            }

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
