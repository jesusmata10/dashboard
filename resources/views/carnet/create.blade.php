@extends('adminlte::page')
@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-12">
            @if (session('success'))
                <div class="alert alert-success desva">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger desva">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('carnetPatria.store') }}" method="POST" role="form" data-toggle="validator"
                  class="form" id="personaForm" name="personaForm">
                {{ csrf_field() }}

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Carnet Patria</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <label for="">C&eacute;dula:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" maxlength="12" name="cedula">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="nzona">Serial:</label>
                                <input class="form-control text-uppercase" type="text" name="serial">
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="nzona">Codigo:</label>
                                <input class="form-control text-uppercase" type="text" name="codigo">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button class="btn btn-primary btn-sm mx-1" type="submit">Guardar <i
                                    class="fa fa-check-circle"></i></button>
                            <a href="{{'/carnetPatria'}}" type="button" class="btn btn-danger btn-sm float-right">Cancelar
                                <i class="fa fa-minus-circle"></i></a>
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
    <script>

        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            clearBtn: true,
            language: "es",
            orientation: "bottom auto",
            changeYear: false,
            endDate: new Date()
        });

        $(document).ready(function () {


            $('#entidad_id').change(function () {
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

            $('.estado').change(function () {
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

