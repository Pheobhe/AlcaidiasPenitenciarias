@section('title', 'Destinos')

    @extends('layouts.app')

@section('content') 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Destinos</h2>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
            <div id="table_box_bootstrap"></div>
        <table class="table table-hover table-responsive table-condensed table-sm ">
            <thead>
                <tr>
                    <th>id</th>
                    <th> Nombre </th>
                    <th> Dirección </th>
                    <th> Teléfono</th>
                    <th> Fecha inauguración</th>
                    <th> Población Masculina</th>
                    <th> Población Femenina</th>
                    <th> Población Trans</th>
                    <!-- <th> </th>  -->
                    <th width="280px">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($destinos as $destino)
                    <tr>
                        <td>{{ $destino->id }}</td>
                        <td>{{ $destino->nombre }}</td>
                        <td>{{ $destino->direccion }}</td>
                        <td>{{ $destino->telefono }}</td>
                        <td>{{ $destino->inauguracion }}</td>
                        <td>{{ $destino->capacidadActual() ?  $destino->capacidadActual()->cap_masculina : 'no consta' }}</td>   
                        <td>{{ $destino->capacidadActual() ?  $destino->capacidadActual()->cap_femenina : 'no consta' }}</td> 
                        <td>{{ $destino->capacidadActual() ?  $destino->capacidadActual()->cap_trans : 'no consta' }}</td>                       
                        
                        <td>
                            <form action="{{ route('destinos.destroy',$destino->id) }}" method="Post">
                                <!-- <a href="{{ route('destinos.edit',$destino->id) }}" class="btn btn-primary"><ion-icon name="create"size="small"></ion-icon></a> -->
                                @csrf
                                @method('DELETE')
                                <!-- <button type="submit"class="btn btn-danger" onclick="return youSure();"><ion-icon name="close-circle"size="small"></ion-icon></button> -->
                                <a href="{{ route('capacidad.create',$destino->id) }}" class="btn btn-primary ml-3" title="Agregar capacidades"><ion-icon name="person-add-outline"></ion-icon></a> 
                                <a href="{{ route('destino.historial',$destino) }}" class="link-info" title="Ver historial"><x-go-history-16 class="icon" /></a>
                                <a class="" href="{{ route('destinos.show', $destino->id) }}" title="Ver detalle"><x-heroicon-s-magnifying-glass-circle class="icon" /></a>

                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('destinos.create') }}"> Crear Destino</a>
        </div>

        {!! $destinos->links() !!}
    </div>
@endsection