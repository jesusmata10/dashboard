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

        <div id="criterioBusqueda" class="alert alert-danger desva" style="display: none" role="alert">
            Debe seleccionar un criterio de b&uacute;squeda
        </div>

        <!-- Button trigger modal -->

        <form action="{{-- url('/usuario') --}}" method="GET" role="form" id="form">
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
                            <input class="form-control" type="text" name="cedula">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Nombres</label>
                            <input class="form-control text-uppercase" type="text" name="nombres">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Apellidos</label>
                            <input class="form-control text-uppercase" type="text" name="apellidos">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        @can('consultar')
                        @endcan
                        <button type="button" name="send" onClick="validar()" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        <a href="{{-- url('/usuario') --}}" type="button" class="btn btn-primary"><i class="fa fa-eye"></i> Ver Todos</a>

                        <button type="reset" class="btn btn-primary"><i class="fa fa-trash"></i> Limpiar</button>
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
                        <a href="{{ url('personas/create') }}" type="button" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Nuevo</a>

                        {{--@can('reporte')
                            <button type="button" onClick="reports('pdf')" class="btn btn-outline-primary "><i class="fa fa-file"></i> Pdf</button>
                            <button type="button" onClick="reports('excel')" class="btn btn-outline-primary"><i class="fa fa-file"></i> Excel</button>
                        @endcan--}}
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-12">

                        <table id="example2" class="table table-bordered table-hover">
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
                                @foreach($persona as $items)
                                <tr class="text-center">
                                    <td>{{ $items->id }}</td>
                                    <td>{{ $items->nombres . ' ' . $items->apellidos }}</td>
                                    <td>{{ $items->cedula}}</td>
                                    <td>{{ $items->correo }}</td>
                                    <td>
                                        <div class="text-center ">
                                            <a href="{{ url('/personas/' . encrypt($items->id) ) }}" title="Ver" type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/personas/'.encrypt($items->id).'/edit') }}" title="Editar" type="button" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            
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
                        <table id="example2" class="table table-bordered table-hover">
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
@section('footer')
<div></div>
@stop
@section('js')
<script>
    /*$('.openBtn').on('click',function(){
    $('.modal-body').load('getContent.php?id=2',function(){
        $('#myModal').modal({show:true});
    });
});
    function modal(item) {
            let datatable = {{--{!! $report !!}--}}
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
        }*/

    $(document).ready(function() {

        $('#btnAgregarFamiliar').on('click', function() {
            accionAgregarFamiliar();
        })


        accionAgregarFamiliar = function() {
            var id = ++$("input[name='personaTemp[]']").length
            let nombres = $('#nombres').val()
            let apellidos = $('#apellidos').val()
            let cedula = $('#cedula').val()
            let fecha = $('#fecha').val()
            let parentezco = $('#parentezco').val()
            let parentezcotxt = $('#parentezco option:selected').text()

            let data = {
                id: id,
                nombres: nombres,
                apellidos: apellidos,
                cedula: cedula,
                fecha: fecha,
                parentezco: parentezco,
                parentezcotxt: parentezcotxt
            }

            let accion = JSON.stringify(data)
            console.log(accion);
            if (nombres !== '' && apellidos !== '' && fecha !== '' && parentezco !== '') {
                $('#mytable').append(`

            <tr id="row${id}">
                <td style="display: none">
                    <input type="hidden" name="personaTemp[]" value='${accion}' />
                </td>
                <td>${nombres}</td>
                <td>${apellidos}</td>
                <td>${cedula}</td>
                <td>${fecha}</td>
                <td>${parentezcotxt}</td>
                <td>
                    <button type="button" class="btn btn-danger" onclick='eliminarFamiliar(${id})'>
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>

        `);

            } else {
                $('#alert').html('Debe cargar toda la información de la sección de Servicios');
                $('#alert').fadeIn();
                setTimeout(function() {
                    $('#alert').fadeOut();
                }, 3000);
            }

            //limpia los input despues de insertar
            $('#nombres').val('');
            $('#apellidos').val('');
            $('#cedula').val('');
            $('#fecha').val('');
            $('#parentezco').val('');

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
                $('#parroquia_id').append('<option value="" selected>Seleccione una opción</option>');

            },
            beforeSend: function() {
                $('#municipio_id').append('<option value="" selected>Buscando...</option>');
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