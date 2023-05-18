<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Destino extends Model
{
    use HasFactory; 
    use SoftDeletes;
     
    protected $fillable = ['nombre', 'direccion', 'telefono','inauguracion', 'tipo_destino_id'];

    public static function boot()
    {
        parent::boot();
    
        static::deleting(function($destino) { 
            foreach ($destino->capacidades as $capacidad) {
                $capacidad->delete();
            }
        });

        static::restoring(function($destino) { 
            foreach ($destino->capacidades as $capacidad) {
                $capacidad->withTrashed()->restore();
            }
        });

    }

    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }

    public function capacidades()
    {
        return $this->hasMany(Capacidad::class);
    }
    public function complejo()
    {
        return $this->belongsTo(Complejo::class);
    }
    public function tipo_destino(){
        return $this->belongsto(TipoDestino::class);
    }
    public function capacidadActual($fecha = NULL)
    {
        if($fecha == NULL) $fecha = now();
        return $this->hasMany(Capacidad::class)->where('fecha_inicio','<=',$fecha)->latest()->first();
    }

}

