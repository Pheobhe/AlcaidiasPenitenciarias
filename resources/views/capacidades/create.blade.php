@section('title', 'Agregar capacidad')

@extends('layouts.app')

@section('content') 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Actualizar capacidad para {{$destino->nombre}}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary back" href="{{ route('destinos.index') }}"> Volver</a>
                </div> 
                <br>
            </div>
        </div>
        
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        
        <form action="{{ route('capacidad.store', $destino->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                                
                        <strong> Fecha del Parte:</strong>
                        <br>
                        <input type="date" name="fecha_inicio" class="form-control" value={{\Carbon\Carbon::now()}}> 
                        <br>
                        @foreach ($tipos_capacidad as $tipo_capacidad)
                            
                            <br>
                            <div class="switch-y-capacidad">
                            <label class="switch">
                                <input type="checkbox" id="switch_capacidad_{{$tipo_capacidad}}" name="cap_{{$tipo_capacidad}}_active" onchange="toggleInput('{{$tipo_capacidad}}')" {{ ($capacidad == null || $capacidad->capacidadParaTipo($tipo_capacidad) == 0)? "" : "checked" }}> 
                                <span class="slider round"> </span> 
                            </label>
                            <br>
                            <strong class="titulo-carga-capacidad"> Población {{$tipo_capacidad}}:</strong>
                            <input type="text" name="cap_{{$tipo_capacidad}}" id="capacidad_{{$tipo_capacidad}}" class="form-control-capacidades" placeholder="población {{$tipo_capacidad}}" value="{{ ($capacidad != null) ? $capacidad->capacidadParaTipo($tipo_capacidad) : 0 }}" {{ ($capacidad == null || $capacidad->capacidadParaTipo($tipo_capacidad) == 0)?  "readonly" : "" }}> 
                            </div>
                            <br>
                        @endforeach

                        @error('capacidad')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary ml-3">Guardar</button>
            </div>
        </form>
    </div>
    <script>
        //Funcionalidad de switches de capacidades

        function toggleInput(tipoCapacidad)
        {
            var elemento = $('#capacidad_'+tipoCapacidad);
            if(elemento.attr('readonly') == 'readonly' || $('#switch_capacidad_'+tipoCapacidad).prop('checked') == true){
                elemento.attr('readonly', false);
            }else{
                elemento.attr('readonly', 'readonly');
            }
        }
    </script>
@endsection