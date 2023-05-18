<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDestino extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'nombre','tieneDepartamento','tieneComplejo'
    ];
    protected $table = 'tipo_destinos';
    
    public function destinos()
    {
        return $this->hasMany(Destino::class);
    }
}
