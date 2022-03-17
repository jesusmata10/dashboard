@extends('adminlte::page')
@section('content')
{{--criterio de busqueda--}}
<div class="row">
    <div class="col-12">

        @if (session('success'))
        <div class="alert alert-success desva">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger desva">
            {{ session('error') }}
        </div>
        @endif

        {{--<div id="criterioBusqueda" class="alert alert-danger desva" style="display: none" role="alert">
            Debe seleccionar un criterio de b&uacute;squeda
        </div>--}}
        <div id="criterioBusqueda" class="alert alert-danger desva" style="display: none" role="alert">
            <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban" style="font-size:15px"></i>¡Error!</h5>
            Debe seleccionar un criterio de b&uacute;squeda
        </div>

        <!-- Button trigger modal -->

        <form action="{{ url('/personas') }}" method="GET" role="form" id="form">
            {{ csrf_field() }}
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Criterios de B&uacute;squeda</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">C&eacute;dula</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                </div>
                            <input class="form-control" type="text" name="cedula">
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Nombres</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                </div>
                                <input class="form-control text-uppercase" type="text" name="nombres">
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Apellidos</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                </div>
                                <input class="form-control text-uppercase" type="text" name="apellidos">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">

                        <button type="button" name="send" onClick="validar()" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        <a href="{{ url('/personas') }}" type="button" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Ver Todos</a>

                        <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Limpiar</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <a href="{{ url('personas/create') }}" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Nuevo</a>

                            <button type="button" onClick="reports('pdf')" class="btn btn-sm btn-primary "><i class="fa fa-file-pdf"></i> Pdf</button>
                            {{--@can('reporte')
                            <button type="button" onClick="reports('excel')" class="btn btn-sm btn-primary"><i class="fa fa-file-excel"></i> Excel</button>
                        @endcan--}}
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="example2" class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="width:50px">N°</th>
                                    <th>Nombres y Apellido</th>
                                    <th>Cedula</th>
                                    <th>Correo</th>
                                    <th style="width:150px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lista as $items)
                                <tr class="text-center">
                                    <td>{{ $items->num }}</td>
                                    <td>{{ $items->nombres . ' ' . $items->apellidos }}</td>
                                    <td>{{ $items->cedula}}</td>
                                    <td>{{ $items->correo }}</td>
                                    <td>
                                        <div class="text-center ">
                                            <a href="{{ url('/personas/' . encrypt($items->id) ) }}" title="Ver" type="button" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/personas/'.encrypt($items->id).'/edit') }}" title="Editar" type="button" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                            <!-- button type="button" class="btn btn-outline-primary">Eliminar</button -->

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            @if ($lista->total() > 2)
                <div class="card-footer">
                    <div class="float-right">
                        {{ $lista->withQueryString()->links() }}
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Información del Jefe de Hogar</h4>
                <button type="button" class="close btn b" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-12">
                        <h4>Datos Personales</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="">C&eacute;dula:</label>
                        <input type="text" class="form-control" name="mo_cedula" readonly>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Correo Electr&oacute;nico:</label>
                        <input type="text" class="form-control" name="mo_email" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="">Nombres:</label>
                        <input type="text" class="form-control" name="mo_nombres" readonly>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Apellidos:</label>
                        <input type="text" class="form-control" name="mo_apellidos" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="">Tel&eacute;fono fijo:</label>
                        <input type="text" class="form-control" name="telefono_fijo" readonly>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Tel&eacute;fono Movil:</label>
                        <input type="text" class="form-control" name="celular" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label for="">Direcci&oacute;n Habitaci&oacute;n:</label>
                        <input type="text" class="form-control" name="mo_direccion_habitacion" readonly>
                    </div>
                </div>

                <div class="row">
                    {{--
                    <div class="form-group col-6">
                      <label for="">Entidad:</label>
                      <input type="text" class="form-control" name="mo_entidad" readonly>
                    </div> --}}
                    <div class="form-group col-6">
                        <label for="">Estatus:</label>
                        <input type="text" class="form-control" name="mo_estatus" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <h4>Carga Familiar</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="example2" class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="width:50px">N°</th>
                                    <th>Nombres y Apellido</th>
                                    <th>Cedula</th>
                                    <th>Correo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carga_familiar as $items)
                                <tr class="text-center">
                                    <td>{{ $items->id }}</td>
                                    <td>{{ $items->nombres . ' ' . $items->apellidos }}</td>
                                    <td>{{ $items->cedula}}</td>
                                    <td>{{ $items->correo }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="">Nombre Usuario:</label>
                        <input type="text" class="form-control" name="mo_name" readonly>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Rol:</label>
                        <input type="text" class="form-control" name="mo_roles" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>

        function modal(item) {
            let datatable = {!! $report !!}
            const result = datatable.filter(datatable => datatable.id === item)

            $('input[name=mo_cedula]').val(result[0].cedula)
            $('input[name=mo_email]').val(result[0].email)
            $('input[name=mo_nombres]').val(result[0].nombres)
            $('input[name=mo_apellidos]').val(result[0].apellidos)
            $('input[name=mo_telefono_local]').val(result[0].telefono_local)
            $('input[name=mo_telefono_movil]').val(result[0].telefono_movil)
            $('input[name=mo_entidad]').val(result[0].nombre_entidad)
            $('input[name=mo_municipio]').val(result[0].nombre_municipio)
            $('input[name=mo_parroquia]').val(result[0].nombre_parroquia)
            $('input[name=mo_direccion_habitacion]').val(result[0].direccion_habitacion)
            // $('input[name=mo_entidad]').val(result[0].entidad)
            $('input[name=mo_estatus]').val(result[0].estatus)
            $('input[name=mo_name]').val(result[0].name)
            $('input[name=mo_roles]').val(result[0].roles)
        }
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
                    $('#parroquia_id').append('<option value="" selected>Seleccione una opción</option>');

                },
                beforeSend: function() {
                    $('#municipio_id').append('<option value="" selected>Buscando...</option>');
                }
            });
        })

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

        })

        function reports(type) {
            var link = window.location.search
            var inicio = link.indexOf('&')

            if (inicio == -1) {
                cadena = ''
            } else {
                var cadena = link.substring(inicio)
            }

            if (type == 'pdf') {
                window.open('{{ url('/personasPdf') }}' + '?' + cadena, '_blank')
            } else {
                window.open('{{ url('/personasExcel') }}' + '?' + cadena, '_blank')
            }
        }


    </script>

@stop
@section('footer')
<div></div>
@stop

