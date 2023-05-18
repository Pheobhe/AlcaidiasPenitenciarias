@section('title', 'Editar capacidad')

    @extends('layouts.app')

@section('content') 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar Capacidad</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary back" href="{{ route('capacidad.index') }}" enctype="multipart/form-data">
                        Volver</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('capacidad.update',$capacidad->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Cupos:</strong>
                        <input type="text" name="nombre" value="{{ $capacidad->cap_femenina }}" class="form-control"
                            placeholder="">
                            <input type="text" name="nombre" value="{{ $capacidad->cap_masculina }}" class="form-control"
                            placeholder="">
                            <input type="text" name="nombre" value="{{ $capacidad->cap_trans }}" class="form-control"
                            placeholder="">
                        @error('nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>                
                         
                <button type="submit" class="btn btn-primary ml-3">Guardar</button>
            </div>
        </form>
    </div>
@endsection