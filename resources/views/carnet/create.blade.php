@extends('adminlte::page')
@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-12">

            <form action="{{ route('carnet.store') }}" method="POST" role="form" data-toggle="validator"
                  class="form" id="carnetForm" name="carnetForm">
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
                                    <input type="text" class="form-control" maxlength="12" name="cedula" value="{{old('cedula')}}">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="nzona">Serial:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" maxlength="10" name="serial" value="{{ old('serial')}}">

                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="nzona">Codigo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input class="form-control text-uppercase" type="text" maxlength="10"name="codigo" value="{{ old('codigo')}}">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button class="btn btn-primary btn-sm mx-1" id="guardar" type="submit">Guardar <i class="fa fa-save"></i>
                            </button>
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

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\CarnetCreateRequest', '#carnetForm') !!}


    <script>

        @if(session('error'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
            }
            toastr.error("{{ session('error') }}");

        @endif

    </script>
@stop

