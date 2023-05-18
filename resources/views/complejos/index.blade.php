@section('title', 'Complejos')

@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Complejos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('complejos.create') }}"> Crear nuevo Complejo</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($complejos as $complejo)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $complejo->name }}</td>
            
            <td>
                <form action="{{ route('complejos.destroy',$complejo->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('complejos.show',$complejo->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('complejos.edit',$complejo->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $complejos->links() !!}
      
@endsection