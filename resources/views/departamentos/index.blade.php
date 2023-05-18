@section('title', 'Departamentos')

    @extends('layouts.app')

@section('content') 
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Departamentos</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('departamentos.create') }}"> Crear Departamento</a>
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
                    <th>id</th>
                    <th> Nombre </th>                   
                    <th> Alcaidías</th>
                    <th width="280px">Acción</th>
                </tr>
            </thead>
            <tbody>
                @if (!is_null($departamentos))
                    @foreach ($departamentos as $departamento)
                        <tr>
                            <td>{{ $departamento->id }}</td>
                            <td>{{ $departamento->nombre }}</td>                                            
                            <td> 
                                @if (!is_null($departamento->destinos))
                                    @foreach ($departamento->destinos as $destino)
                                        {{ $destino->nombre }} 
                                    @endforeach
                                @else 
                                    <p>Sin asignar</p>
                                @endif
                            </td> 
                            <td>
                                <form action="{{ route('departamentos.destroy',$departamento->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('departamentos.edit',$departamento->id) }}">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {!! $departamentos->links() !!}
    </div>
@endsection