<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'capacidades';
    protected $fillable = ['destino_id','fecha_inicio','cap_masculina','cap_femenina','cap_trans'];

    
    public function destino(){
        return $this->belongsTo(Destino::class);
    }
    public function capacidadParaTipo($tipo_capacidad){
        return $this->{ 'cap_'.$tipo_capacidad };
    }
}
