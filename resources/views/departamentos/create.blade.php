@section('title', 'Agregar departamento')

    @extends('layouts.app')

@section('content') 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Agregar Departamento</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary back" href="{{ route('departamentos.index') }}"> Volver</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('departamentos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Nombre:</strong>
                        <input type="text" name="nombre" class="form-control" placeholder="nombre" value="{{old('nombre')}}>
                        @error('nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alcaidia:</strong>
                        <input type="text" name="direccion" class="form-control" placeholder="direccion" value="{{old('direccion')}}>
                        @error('direccion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}
               
                <button type="submit" class="btn btn-primary ml-3">Guardar</button>
            </div>
        </form>
    </div>
@endsection