@section('title', 'Destino')

@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ $destino->nombre }}</h2>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-hover table-responsive table-condensed table-sm">
            <thead>
                <tr>
                    <th>id</th>
                    <th> Nombre </th>
                    <th> Dirección </th>
                    @if ($destino->tipo_destino->id != '3') 
                    <th> Complejo </th>
                    @endif
                    <th> Teléfono</th>
                    <th> Fecha inauguración</th>
                    <th> Población Masculina</th>
                    <th> Población Femenina</th>
                    <th> Población Trans</th>
                    
                    @if ($destino->tipo_destino->id == '3') 
                    <th> Departamento judicial </th>
                    @endif
                    <th width="280px">Acción</th>
                </tr>
            </thead>
            <tbody>
            {{-- {{dd($destino->tipo_destino)}} --}}
                <tr>
                    <td>{{ $destino->id }}</td>
                    <td>{{ $destino->nombre }}</td>
                    <td>{{ $destino->direccion }}</td>
                    @if ($destino->tipo_destino->id != '3') 
                        <td>
                            {{$destino->complejo->nombre}}
                           
                       </td>
                    @endif
                    <td>{{ $destino->telefono }}</td>
                    <td>{{ $destino->inauguracion }}</td>
                    <td>{{ $destino->capacidadActual() ? $destino->capacidadActual()->cap_masculina : 'no consta' }}</td>
                    <td>{{ $destino->capacidadActual() ? $destino->capacidadActual()->cap_femenina : 'no consta' }}</td>
                    <td>{{ $destino->capacidadActual() ? $destino->capacidadActual()->cap_trans : 'no consta' }}</td>
                   
                    @if ($destino->tipo_destino->id == 3) 
                        <td> 
                            @foreach ($destino->departamentos as $departamento)
                            {{$departamento->nombre}}
                            @endforeach
                           
                            
                           
                       </td>
                    @endif
                    

                    <td>
                        <form action="{{ route('destinos.destroy', $destino->id) }}" method="Post">
                            <a href="{{ route('destinos.edit', $destino->id) }}" class="btn btn-primary">
                                <ion-icon name="create"size="small"></ion-icon>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"class="btn btn-danger" onclick="return youSure();">
                                <ion-icon name="close-circle"size="small"></ion-icon>
                            </button>
                            <a href="{{ route('capacidad.create', $destino->id) }}" class="btn btn-primary ml-3">
                                <ion-icon name="person-add-outline"></ion-icon>
                            </a> <br>
                            <a href="{{ route('destino.historial', $destino->id) }}" class="link-info"> ver historial </a>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>


    </div>
@endsection
