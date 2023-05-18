<?php

namespace App\Http\Controllers;
use App\Models\Capacidad;
use App\Models\Destino;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CapacidadController extends Controller
{
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {       
        $fecha = $request->input('fecha');
        if($fecha == NULL) {
            $fecha = now();
        }

        $destinos = Destino::where('inauguracion','<=',$fecha)->paginate(20);
    
        return view('capacidades.index', 
            [
                'fecha' => $fecha,
                'destinos' => $destinos
            ]
    );
    }

    public function historialCapacidad(Destino $destino) 
    {
        $capacidadActual = $destino->capacidadActual();
        $capacidades = Capacidad::where('destino_id', $destino->id )->simplePaginate(5);
        
        $paginatorCollection = $capacidades->getCollection();
        $historialCollection = $paginatorCollection->filter(function($model) use ($capacidadActual){
            return $model->id != $capacidadActual->id;
        });
        $capacidades->setCollection($historialCollection);

        return view('capacidades.historialCapacidad', ['capacidades' => $capacidades, 'capacidadActual' => $capacidadActual, 'destino' => $destino]);

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Destino $destino)
    {
        $capacidad = $destino->capacidadActual();
        return view('capacidades.create', 
        [
            'destino' => $destino, 
            'capacidad' => $capacidad,
            'tipos_capacidad' => ['femenina','masculina','trans']
        ]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request, Destino $destino)
    {
        $valida = $request->validate([
            'fecha_inicio' => 'required|date',
            'cap_masculina' => 'required|numeric',
            'cap_femenina' => 'required|numeric',
            'cap_trans' => 'required|numeric',
            // 'cap_femenina_active' => 'required|boolean',
            // 'cap_masculina_active' => 'required|boolean',
            // 'cap_trans_active' => 'required|boolean',
        ]);
        $data = $request->post();
        $data['destino_id'] = $destino->id;

        Capacidad::create([
            'destino_id'=>$destino->id,
            'fecha_inicio'=>$request->input('fecha_inicio'),
            'cap_masculina'=>$request->input('cap_masculina'),
            'cap_femenina'=>$request->input('cap_femenina'),
            'cap_trans'=>$request->input('cap_trans'),
            'cap_masculina_active' => $request->input('cap_masculina_active') ? $request->input     ('cap_masculina_active') : false,
            'cap_femenina_active'=>$request->input('cap_femenina_active')? $request->input     ('femenina') : false,
            'cap_trans_active'=>$request->input('cap_trans_active')? $request->input     ('cap_trans_active') : false,
        ]);

        return redirect()->route('destinos.index')->with('success','Capacidad creada para la unidad '. $destino->name);
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Capacidad  $capacidad
    * @return \Illuminate\Http\Response
    */
    public function show(Capacidad $capacidad)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Capacidad  $capacidad
    * @return \Illuminate\Http\Response
    */
    public function edit(Capacidad $capacidad)
    {
        return view('capacidades.edit',compact('capacidad'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Capacidad  $capacidad
    * @return \Illuminate\Http\Response
    */
    public function update(Capacidad $capacidad)
    {
        
        
        $capacidad->fill($request->post())->save();

        return redirect()->route('capacidad.index')->with('success','Capacidad Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Capacidad  $capacidad
    * @return \Illuminate\Http\Response
    */
    public function destroy(Capacidad $capacidad)
    {
        $capacidad->delete();
        return redirect()->route('capacidad.index')->with('success','Capacidad has been deleted successfully');
    }
}
