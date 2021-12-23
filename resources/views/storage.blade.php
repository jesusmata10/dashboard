{{--@extends('layouts.app')--}}
@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel Storage Example</div>
                    <div class="card-body">
                        <form action="{{ route('upload.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">Seleccione un archivo para cargar</label>
                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}">
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Subir archivo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<div class="row">
 
</div>
@stop