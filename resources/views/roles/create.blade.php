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
                <h3 class="card-title">Nuevo Rol</h3>
            </div>
            <form class="form" id="rolesForm" name="rolesForm" role="form" data-toggle="validator" method="POST" action="{{ url('roles') }}">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control text-uppercase">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-outline-primary">Aceptar</button>
                        <a href="{{ url('/roles') }}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

@section('footer')
  <h5>Creado por: Ing. Jesus Mata - 2021</h5>
@stop
