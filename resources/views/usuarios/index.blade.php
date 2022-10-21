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

            <form action="{{-- url('/usuario') --}}" method="GET" role="form" id="form">
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
                            <div class="form-group col-6">
                                <label for="">C&eacute;dula</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="cedula">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Rol</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <select class="form-control" name="rol">
                                        <option value="" selected>Seleccione una opci&oacute;n</option>
                                        @foreach ($rol as $items)
                                            <option value="{{ $items->id }}">{{ $items->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Nombres</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" name="nombres">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">Estatus</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                    </div>
                                    <select class="form-control" name="estatus">
                                        <option value="" selected>Seleccione una opci&oacute;n</option>
                                        <option value="1">ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="button" name="send" onClick="validar()" class="btn btn-sm btn-primary"><i
                                    class="fa fa-search"></i> Buscar</button>
                            <a href="{{ url('/usuario') }}" type="button" class="btn btn-sm btn-primary"><i
                                    class="fa fa-eye"></i> Ver Todos</a>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                Limpiar</button>
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

                            <a href="{{ url('usuario/create') }}" type="button" class="btn btn-sm btn-primary"><i
                                    class="fa fa-plus"></i> Nuevo</a>
                            <button type="button" onClick="reports('pdf')" class="btn btn-sm btn-primary"><i
                                    class="fa fa-file"></i> Pdf</button>
                            <button type="button" onClick="reports('excel')" class="btn btn-sm btn-primary"><i
                                    class="fa fa-file"></i> Excel</button>

                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-12">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width:50px">N°</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>email</th>
                                        <th>Rol</th>

                                        <th style="width:100px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (count($lista) <= 0)
                                        <tr class="text-center">
                                            <td colspan="6">No hay resultado que mostrar</td>
                                        </tr>
                                    @else
                                        @foreach ($lista as $items)
                                            <tr class="text-center">
                                                <td>{{ $items->id }}</td>
                                                <td>{{ $items->personas->primer_nombre ?? 'Sin Datos' }}</td>
                                                <td>{{ $items->personas->primer_apellido ?? 'Sin Datos' }}</td>
                                                <td>{{ $items->email }}</td>
                                                <td>{{ isset($items->roles[0]->name) ? $items->roles[0]->name : '' }} <span class="float-right badge badge-success">Activo</span></td>
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" onClick="modal({{ $items->id }})"
                                                            title="Ver" data-toggle="modal" data-target="#modal-xl"
                                                            class="btn btn-sm btn-secondary"><i
                                                                class="fas fa-eye"></i></button>
                                                        <a href="{{ url('/usuario/' . encrypt($items->id) . '/edit') }}"
                                                            title="Editar" type="button"
                                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                        <!-- button type="button" class="btn btn-outline-primary">Eliminar</button -->
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                @if ($lista->total() > 2)
                    <div class="card-footer">
                        <div class="float-right">
                            {{ $lista->links() }}
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-md">
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
                            <input type="text" class="form-control" name="mo_email" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Primer Nombres:</label>
                            <input type="text" class="form-control" name="mo_nombres" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Primer Apellidos:</label>
                            <input type="text" class="form-control" name="mo_apellidos" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Rol:</label>
                            <input type="text" class="form-control" name="mo_role" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Tel&eacute;fono Movil:</label>
                            <input type="text" class="form-control" name="mo_telefono_movil" readonly>
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

                    <!--<div class="row">
                              <div class="form-group col-12">
                                  <h4>Datos Usuario</h4>
                              </div>
                          </div>

                          <div class="row">
                              <div class="form-group col-6">
                                  <label for="">Nombre Usuario:</label>
                                  <input type="text" class="form-control" name="mo_name" readonly>
                              </div>
                              <div class="form-group col-6">
                                  <label for="">Rol:</label>
                                  <input type="text" class="form-control" name="mo_role" readonly>
                              </div>
                          </div>-->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script type="text/javascript">
    console.log('hola');
        function modal(item) {
            let datatable = {!! $dato !!}
            const result = datatable.filter(datatable => datatable.id === item)
            console.log(result);

            $('input[name=mo_cedula]').val(result[0].personas.cedula)
            $('input[name=mo_email]').val(result[0].email)
            $('input[name=mo_nombres]').val(result[0].personas.primer_nombre)
            $('input[name=mo_apellidos]').val(result[0].personas.primer_apellido)
            $('input[name=mo_telefono_movil]').val(result[0].personas.celular)
            $('input[name=mo_estatus]').val(result[0].estatus)
            $('input[name=mo_name]').val(result[0].name)
            $('input[name=mo_role]').val(result[0].roles[0].name)
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

    </script>
@endsection

@section('footer')
    <div></div>
@endsection

@endsection
