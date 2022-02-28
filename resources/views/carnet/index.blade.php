@extends('adminlte::page')
@section('content')

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

            <div id="criterioBusqueda" class="alert alert-danger desva" style="display: none" role="alert">
                Debe seleccionar un criterio de b&uacute;squeda
            </div>

            <form action="{{ url('/carnetPatria') }}" method="GET" role="form" id="form">
                {{ csrf_field() }}
                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Criterios de B&uacute;squeda</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="">C&eacute;dula</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="cedula">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="button" name="send" onClick="validar()" class="btn btn-sm btn-primary"><i
                                    class="fa fa-search"></i> Buscar
                            </button>
                            <a href="{{ url('/carnetPatria') }}" type="button" class="btn btn-sm btn-primary"><i
                                    class="fa fa-eye"></i> Ver Todos</a>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Limpiar
                            </button>
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

                            <a href="{{ url('carnetPatria/create') }}" type="button" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> Nuevo</a>

                            <button type="button" onClick="reports('pdf')" class="btn btn-sm btn-primary">
                                <i class="fa fa-file"></i> Pdf
                            </button>
                            <button type="button" onClick="reports('excel')" class="btn btn-sm btn-primary">
                                <i class="fa fa-file"></i> Excel
                            </button>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-12">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-center">
                                    <th style="width:50px">N°</th>
                                    <th>CEDULA</th>
                                    <th>NOMBRES Y APELLIDOS</th>
                                    <th>SERIAL</th>
                                    <th>CODIGO</th>
                                    <th style="width:150px">ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($carnet as $items)
                                    <tr class="text-center">
                                        <td>{{ $items->num }}</td>
                                        <td>{{ $items->cedula }}</td>
                                        <td>{{ $items->nombres }} {{ $items->apellidos }}</td>
                                        <td>{{ $items->serial }}</td>
                                        <td>{{ $items->codigo }}</td>
                                        <td>
                                            <div class="text-center">
                                                <button type="button" onClick="modal({{ $items->id }})" title="Ver"
                                                        data-toggle="modal" data-target="#modal-xl"
                                                        class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>
                                                </button>

                                                <a href="{{ url('/usuario/'.encrypt($items->id).'/edit') }}"
                                                   title="Editar" type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i></a>

                                                {{--<button type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i> Eliminar
                                                </button>--}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{--@if($users->total() > 10)
                    <div class="card-footer">
                        <div class="float-right">
                            {{ $users->links() }}
                        </div>
                    </div>
                @endif--}}
            </div>

        </div>
    </div>

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Información del Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                            <input type="text" class="form-control" name="mo_correo" readonly>
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
                            <label for="">Tel&eacute;fono Habitaci&oacute;n:</label>
                            <input type="text" class="form-control" name="mo_telefono_local" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Tel&eacute;fono Movil:</label>
                            <input type="text" class="form-control" name="mo_celular" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Direcci&oacute;n Habitaci&oacute;n:</label>
                            <input type="text" class="form-control" name="mo_direccion_habitacion" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script type="text/javascript">
        function modal(item) {
            let datatable ={!! $carnet !!}
            const result = datatable.filter(datatable => datatable.id === item)

            $('input[name=mo_cedula]').val(result[0].cedula)
            //$('input[name=mo_email]').val(result[0].correo)
            $('input[name=mo_nombres]').val(result[0].nombres)
            $('input[name=mo_apellidos]').val(result[0].apellidos)
            //$('input[name=mo_telefono_local]').val(result[0].telefono_local)
            $('input[name=mo_celular]').val(result[0].telefono_movil)
            //$('input[name=mo_entidad]').val(result[0].nombre_entidad)
            //$('input[name=mo_municipio]').val(result[0].nombre_municipio)
            //$('input[name=mo_parroquia]').val(result[0].nombre_parroquia)
            $('input[name=mo_direccion_habitacion]').val(result[0].direccion_habitacion)
            // $('input[name=mo_entidad]').val(result[0].entidad)
            //$('input[name=mo_estatus]').val(result[0].estatus)
            //$('input[name=mo_name]').val(result[0].name)
            //$('input[name=mo_roles]').val(result[0].roles)
        }

        setTimeout(function() {
            $(".desva").fadeOut(6000)
        }, 12000)

        function validar() {
            var select = $('#form select').length
            var text = $('#form input[type=text]').length

            var i = 1
            var flag = false

            if (select > 0) {
                $.each($('#form select'), function () {
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
                $.each($('#form input[type=text]'), function () {
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
                $('#criterioBusqueda').show()
                desvanecer()
            } else {
                $("#form").submit()
            }
        }

        /**
         * Reports
         */
        function reports(type) {
            var link = window.location.search
            var inicio = link.indexOf('&')

            if (inicio == -1) {
                cadena = ''
            } else {
                var cadena = link.substring(inicio)
            }

            if (type == 'pdf') {
                window.open('{{-- url("/usuarioPdf") --}}' + '?' + cadena, '_blank')
            } else {
                window.open('{{-- url("/usuarioExcel") --}}' + '?' + cadena, '_blank')
            }
        }

        desvanecer()
    </script>

@endsection

@section('footer')
    <div></div>
@endsection

@endsection
