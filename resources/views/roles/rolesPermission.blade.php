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
                <h3 class="card-title">Permiso por Rol</h3>
            </div>
            <form class="form" id="rolesForm" name="rolesForm" role="form" data-toggle="validator" method="POST" action="{{ url('/storeRolPermiso') }}">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Nombre</label>
                            <input readonly name="rol" class="form-control" value="{{ isset($rol['name']) ? $rol['name'] : '' }}">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Permisos</h4>
                        </div>
                    </div><br>

                    <div class="row">
                        @foreach($permission as $items)
                            <div class="col-md-3">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" @if(in_array($items->id, $permisionRole->toArray()))checked @endif name="permiso[]" value="{{ $items->id }}" id="{{ $items->id }}">
                                        <label for="{{ $items->id }}">{{ $items->name }}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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