@extends('adminlte::page')
@section('content')

<div class="row">
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">

            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        
                        <a href="{{ url('parametro/area/create') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Nuevo</a>
                        
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-12">

                        <table id="tabla1" class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th style="width:50px">N°</th>
                                    <th>Area</th>
                                    <th style="width:100px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--@can('consultar')--}}
                                    @foreach($calle as $items)
                                        <tr class="text-center">
                                            <td>{{ $items->numero }}</td>
                                            <td class="text-uppercase">{{ $items->nombre }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{ url('/roles/modulePermission/'.$items->id)}}" title="Módulos" class="btn btn-outline-primary btn-sm"> <i class="fa fa-shield-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                {{--@endcan --}}
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

           {{-- @if($datatable->total() > 10)
                <div class="card-footer">
                    <div class="float-right">
                        {{ $datatable->links() }}
                    </div>
                </div>
            @endif--}}
        </div>

    </div>
</div>
@endsection


@section('footer')
  <div></div>
@stop