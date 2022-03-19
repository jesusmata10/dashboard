@extends('adminlte::page')
@section('content')

<div class="row">
    <div class="col-12">

        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nueva Zona</h3>
            </div>
            <form class="form" id="FormZona" name="FormZona" role="form" data-toggle="validator" method="POST" action="{{ url('/parametro/zona') }}">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control text-uppercase">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-sm btn-primary">Aceptar</button>
                        <a href="{{ url('/parametro/zona') }}" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
@section('js')

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\ZonaRequest', '#FormZona') !!}

@endsection

@section('footer')
  <h5>Creado por: Ing. Jesus Mata - 2021</h5>
@stop
