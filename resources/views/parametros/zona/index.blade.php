@extends('adminlte::page')
@section('content')

<div class="row">
    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <div class="row">
                    <div class="col-12">

                        <a href="{{ url('parametro/zona/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Nuevo</a>

                    </div>
                </div><br>

                <div class="row">
                    <div class="col-12">

                        <table id="tabla1" class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="width:50px">N°</th>
                                    <th>Zonas</th>
                                    <th style="width:100px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--@can('consultar')--}}
                                    @foreach($zonas as $items)
                                        <tr class="text-center">
                                            <td>{{ $items->numero }}</td>
                                            <td class="text-uppercase">{{ $items->nombre }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{-- url('/roles/rolesPermission/'.$items->id)--}}" title="Permisos" class="btn btn-outline-primary btn-sm"> <i class="fa fa-user-shield"></i></a>
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
@section('js')

    <script type="text/javascript">
        @if(session('success'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");

        @endif

            @if(session('error'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('error') }}");

        @endif

    </script>

@endsection

@section('footer')
  <div></div>
@stop
