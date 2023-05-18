<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\Departamento;
use App\Models\Complejo;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {       
        // $destinos = Destino::where('tipo_destino', '=', '2')->orWhere('tipo_destino', '=', '1')->paginate(5);
        $destinos = Destino::paginate(5);
        $departamentos = Departamento::all();

        return view('destinos.index', ['destinos'=>$destinos]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $complejos = Complejo::all();
        $departamentos = Departamento::all();
        return view('destinos.create', ['departamentos' => $departamentos],['complejos' => $complejos]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
    //     $request->validate([
    //         'nombre' => 'required',
    //         'direccion' => 'required',
    //         'telefono' => 'required|numeric',
    //         'inauguracion' => 'required|date',
    //         'tipo_destino_id' => 'required',
    //         // 'departamentos' => 'required|array',
    //         // 'complejo_id'     => 'required_if:tipo_destino_id,3'  
    //    ]);
        $newDestino = Destino::create($request->post());
       
        if($request->tipo_destino_id == '3')
        {
        $newDestino->departamentos()->sync($request->input('departamentos'), false);
        }
        else
        {
        $newDestino->complejo_id = $request->input('complejo_id');
        }
        
        $newDestino->save();

        return redirect()->route('destinos.index')->with('success','Unidad creada.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Destino  $Destino
    * @return \Illuminate\Http\Response
    */
    public function show(Destino $destino)
    {
        
        return view('destinos.show',compact('destino'));
        
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Destino  $Destino
    * @return \Illuminate\Http\Response
    */
    public function edit(Destino $destino)
    {
        $departamentos = Departamento::all();
        return view('destinos.edit', ['destino' => $destino, 'departamentos' => $departamentos]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Destino  $Destino
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Destino $destino)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|numeric',
            'inauguracion' => 'required|date',
            'tipo_destino_id' => 'required',
            'departamentos' => 'required|array'
        ]);
        
        $destino->fill($request->post())->save();
        $destino->departamentos()->sync($request->input('departamentos'), false);

        return redirect()->route('destinos.index')->with('success','Unidad editada con exito');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Destino  $Destino
    * @return \Illuminate\Http\Response
    */
    public function destroy(Destino $destino)
    {
        $destino->delete();
        return redirect()->route('destinos.index')->with('success','Destino has been deleted successfully');
    }    
}