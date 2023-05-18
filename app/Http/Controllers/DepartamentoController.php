<?php

namespace App\Http\Controllers;
use App\Models\Departamento;
use App\Models\Alcaidia;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $departamentos = Departamento::orderBy('nombre')->simplePaginate(5);
        // $departamentos = 
        return view('departamentos.index', compact('departamentos'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            
        ]);
        
        Departamento::create($request->post());

        return redirect()->route('departamentos.index')->with('success','Todo piolaaaaaaa.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Departamento  $Departamento
    * @return \Illuminate\Http\Response
    */
    public function show(Departamento $departamento)
    {
        return view('departamentos.show',compact('departamento'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Departamento  $Departamento
    * @return \Illuminate\Http\Response
    */
    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit',compact('departamento'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Departamento  $Departamento
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required'
            
        ]);
        
        $departamento->fill($request->post())->save();

        return redirect()->route('departamentos.index')->with('success','Departamento Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Departamento  $Departamento
    * @return \Illuminate\Http\Response
    */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success','Departamento has been deleted successfully');
    }
}
