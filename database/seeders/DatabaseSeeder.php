<?php
namespace Database\Seeders;
use App\Models\Departamento;
use App\Models\Capacidad;
use App\Models\Destino;
use App\Models\Complejo;
use App\Models\TipoDestino;
use App\Models\User;
use App\Models\ValorConsolidado;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        // tipo_destino::factory(3)->create();
        //Se crean 20 deptos
        Departamento::factory(20)->create();
        //Se crean 18 complejos
        Complejo::factory(18)->create();
        //se crean 35 destinos
        Destino::factory(35)->create();
        //se crean 40 capacidades
        Capacidad::truncate();
        Capacidad::factory(40)->create();

        $destinos = Destino::all();
        $departamentos = Departamento::all();
        $complejos = Complejo::all();
        $complejos_destinos = Destino::where('tipo_destino_id', '!=', '3')->get();
        $complejos_no_destinos = Destino::where('tipo_destino_id', '!=', '2')
                                ->where('tipo_destino_id', '!=', '1')->get();
    
        Destino::all()->where('tipo_destino_id','=', '3')->each(function ($alcaidia) use ($departamentos) { 
            $alcaidia->departamentos()->attach(
                $departamentos->random(rand(1, 3))->pluck('id')->toArray());
        }); 
        
        Capacidad::all()->each(function ($capacidad) use ($destinos) {
            $capacidad->destino_id = $destinos->random()->id;
        });
        
        $complejos_destinos->each(function ($destino) use ($complejos) {
            $destino->complejo_id = $complejos->random()->id;
            $destino->save();
        });

        
        User::factory(10)->create();
        ValorConsolidado::factory(10)->create();
        
        // foreach ($complejos_destinos as $destino) {
        //     DB::table('course_student')->insert([
        //         'course_id' => $faker->randomElement($coursesIDs)
                
        //     ]);
    } 
    
        // foreach ($complejos_destinos as $destino){
        //     var_dump($destino->tipo_destino_id);
        // } 
        // foreach ($complejos_no_destinos as $noDestino){
        // var_dump($noDestino->tipo_destino_id);
        // }
    
}


