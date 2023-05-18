
@section('title', 'Agregar destino')

@extends('layouts.app')

@section('content') 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Agregar destino</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary back" href="{{ route('destinos.index') }}"> Volver</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('destinos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" >
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Nombre:</strong>
                        <input type="text" name="nombre" class="form-control" placeholder="nombre" value="{{old('nombre')}}">
                        @error('nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Dirección:</strong>
                        <input type="text" name="direccion" class="form-control" placeholder="direccion" value="{{old('direccion')}}">
                        @error('direccion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Teléfono:</strong>
                        <input type="tel" name="telefono" class="form-control" placeholder="Telefono" value="{{old('telefono')}}">
                        @error('telefono')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha de inauguración:</strong>
                        <input type="date" name="inauguracion" class="form-control" placeholder="inauguracion" value="{{old('inauguracion')}}">
                        @error('inauguracion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="col-xs-12 col-sm-12 col-md-12" id="last-div">
                    <div class="form-group">
                        <strong>Tipo de unidad</strong>
                        <select name="tipo_destino_id" id="tipo-destino" class="form-control" >
                            <option value="" selected >
                                Elija una opción
                            </option>
                            <option value="1" >
                                Alcaidia Penitenciaria
                            </option>
                            <option value="2" >
                                Unidad Penitenciaria
                            </option>
                            <option value="3" >
                                Alcaidía Departamental
                            </option>
                        </select> 
                        @error('tipo_destino_id')
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
                var departamentos = '@foreach ($departamentos as $i)<option value="{{$i->id}}">{{$i->nombre}}</option>@endforeach';
                var complejos = '@foreach ($complejos as $i)<option value="{{$i->id}}">{{$i->nombre}}</option>@endforeach'
                var valor=$("#tipo-destino").val();
                i++;
                if(!(valor==="")){
                    if(valor==="3"){
                        $("#input-dinamico"+(i-1)).remove();    
                        $("#last-div").append('<div id="input-dinamico'+i+'" class="col-xs-12 col-sm-12 col-md-12"><div class="form-group"><strong>Departamento/s judicial/es:</strong><select class="js-example-basic-multiple form-control" id="type" name="departamentos[]" multiple required></select></div></div>');
                        $('.js-example-basic-multiple').append(departamentos);
                        $('.js-example-basic-multiple').select2();
                    }else{
                        $("#input-dinamico"+(i-1)).remove();    
                        $("#last-div").append('<div id="input-dinamico'+i+'" class="col-xs-12 col-sm-12 col-md-12"><div class="form-group"><strong>Se encuentra en el Complejo de:</strong><select class="js-example-basic-multiple form-control" id="type" name="complejo_id"></select></div></div>');
                        $('.js-example-basic-multiple').append(complejos);
                        $('.js-example-basic-multiple').select2();
                    }
                }else{
                    $("#input-dinamico"+(i-1)).remove();
                }
            }).trigger('change');
        })
    </script>
@endsection