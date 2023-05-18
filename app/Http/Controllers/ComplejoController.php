<?php

namespace App\Http\Controllers;

use App\Models\Complejo;
use Illuminate\Http\Request;

class ComplejoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complejos = Complejo::latest()->paginate(5);
        // $destinos = Complejo::find(1)->destinos;

        return view('complejos.index',compact('complejos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complejos.create');

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
            'name' => 'required',
            'destino_id' => 'required'
            
        ]);
  
        Complejo::create($request->all());
   
        return redirect()->route('complejos.index')->with('success','Complejo created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complejo  $complejo
     * @return \Illuminate\Http\Response
     */
    public function show(Complejo $complejo)
    {
        return view('complejos.show',compact('complejo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complejo  $complejo
     * @return \Illuminate\Http\Response
     */
    public function edit(Complejo $complejo)
    {
        return view('complejos.edit',compact('complejo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complejo  $complejo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complejo $complejo)
    {
        $request->validate([
            'name' => 'required',
            'destino_id' => 'required'
        ]);
  
        $complejo->update($request->all());
  
        return redirect()->route('complejos.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complejo  $complejo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complejo $complejo)
    {
        
        $complejo->delete();
  
        return redirect()->route('complejos.index')->with('success','complejo deleted successfully');
    }
}
