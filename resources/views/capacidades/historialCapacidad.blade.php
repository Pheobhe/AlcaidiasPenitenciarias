@section('title', 'Capacidades')

    @extends('layouts.app')

@section('content') 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{$destino->nombre}} </h2>
                </div>
               
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th>id</th> --}}
                    <th> Fecha de Parte </th>   
                    <th> Fecha de inicio de vigencia </th>   
                    <th> Población femenina</th>
                    <th> Población masculina</th>
                    <th> Población trans</th>
                    <th width="280px">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-success">
                    <td>{{$capacidadActual->created_at}}</td>
                    <td>{{$capacidadActual->fecha_inicio}}</td>
                    <td>{{ $capacidadActual->cap_femenina }}</td>
                    <td>{{ $capacidadActual->cap_masculina }}</td>  
                    <td>{{ $capacidadActual->cap_trans }}</td>                                             
                        
                    <td>
                        <form action="{{ route('capacidad.destroy',$capacidadActual->id) }}" method="Post">
                            <a class="btn btn-success" href="{{ route('capacidad.edit',$capacidadActual->id) }}">Editar</a>
                            @csrf

                        </form>

                    </td>
                </tr>
                @if (!is_null($capacidades))
                    @foreach ($capacidades as $capacidad)
                        <tr>
                            <td>{{$capacidad->created_at}}</td>
                            <td>{{$capacidad->fecha_inicio}}</td>
                            <td>{{ $capacidad->cap_femenina }}</td>
                            <td>{{ $capacidad->cap_masculina }}</td>  
                            <td>{{ $capacidad->cap_trans }}</td>                                             
                             
                            <td>
                                <form action="{{ route('capacidad.destroy',$capacidad->id) }}" method="Post">
                                    <a class="btn btn-success" href="{{ route('capacidad.edit',$capacidad->id) }}">Editar</a>
                                    @csrf

                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {!! $capacidades->links() !!}
    </div>
@endsection