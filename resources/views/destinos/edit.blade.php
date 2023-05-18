@section('title', 'Editar destino')

@extends('layouts.app')

@section('content') 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar destino</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary back" href="{{ route('destinos.index') }}" enctype="multipart/form-data">
                        Volver</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('destinos.update',$destino->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" value="{{ $destino->nombre }}" class="form-control"
                            placeholder="Nombre de la unidad">
                        @error('nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Dirección:</strong>
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección de la unidad"
                            value="{{ $destino->direccion }}">
                        @error('direccion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Teléfono:</strong>
                        <input type="tel" name="telefono" value="{{ $destino->telefono }}" class="form-control"
                            placeholder="Telefono">
                        @error('telefono')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha de inauguración:</strong>
                        <input type="date" name="inauguracion" value="{{ $destino->inauguracion }}" class="form-control"
                            placeholder="inauguracion">
                        @error('inauguracion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" id="last-div">
                    <div class="form-group">
                        <strong>Tipo de unidad</strong>
                        <select name="tipo_destino_id" id="tipo-destino" class="form-control">
                            <option value="" selected >
                                Elija una opción
                            </option>
                            <option value="unidadPenitenciaria"  @if ($destino->tipo_destino->id == "unidadPenitenciaria") selected="selected" @endif >
                                Unidad Penitenciaria
                            </option>
                            <option value="alcaidiaPenitenciaria" @if ($destino->tipo_destino == "alcaidiaPenitenciaria") selected="selected" @endif >
                                Alcaidía Penitenciaria
                            </option>
                            <option value="alcaidiaDepartamental" @if ($destino->tipo_destino == "alcaidiaDepartamental") selected="selected" @endif >
                                Alcaidía Departamental
                            </option>
                        </select> 
                        @error('tipo_destino')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Guardar</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            var i=1;
            $("#tipo-destino").change(function(){
                var departamentos = '@foreach ($departamentos as $i)<option @if($destino->departamentos->isNotEmpty() && $destino->departamentos->contains("id",$i->id)) selected="selected" @endif value="{{$i->id}}">{{$i->nombre}}</option>@endforeach';
                var valor=$("#tipo-destino").val();
                i++;
                if(!(valor==="")){
                    if(valor==="alcaidiaDepartamental"){
                        $("#input-dinamico"+(i-1)).remove();    
                        $("#last-div").append('<div id="input-dinamico'+i+'" class="col-xs-12 col-sm-12 col-md-12"><div class="form-group"><strong>Departamento/s judicial/es:</strong><select class="js-example-basic-multiple form-control" id="type" name="departamentos[]" multiple required></select></div></div>');
                        $('.js-example-basic-multiple').append(departamentos);
                        $('.js-example-basic-multiple').select2();
                    }else{
                        $("#input-dinamico"+(i-1)).remove();    
                        $("#last-div").append('<div id="input-dinamico'+i+'" class="col-xs-12 col-sm-12 col-md-12"> <div class="form-group"> <strong>Departamento/s Judicial/es:</strong> <input type="checkbox" value= "1" name="departamentosJudiciales" class="form-control" > @error("departamentosJudiciales") <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div> @enderror </div> </div>')
                    }
                }else{
                    $("#input-dinamico"+(i-1)).remove();
                }
            }).trigger('change');
        })
    </script>
@endsection