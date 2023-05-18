@section('title', 'Editar departamento')

    @extends('layouts.app')

@section('content') 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar Departamento</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary back" href="{{ route('departamentos.index') }}" enctype="multipart/form-data">
                        Volver</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('departamentos.update',$departamento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" value="{{ $departamento->nombre }}" class="form-control"
                            placeholder="departamento nombre">
                        @error('nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>                
                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alcaidias:</strong>
                        <input type="tel" name="address" value="{{ $departamento->telefono }}" class="form-control"
                            placeholder="Telefono">
                        @error('telefono')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>               --}}
                <button type="submit" class="btn btn-primary ml-3">Guardar</button>
            </div>
        </form>
    </div>
@endsection