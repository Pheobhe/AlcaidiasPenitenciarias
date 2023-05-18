<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complejo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'nombre'
    ];
    /**
     * Los Destinos de un Complejo Penitenciario.
     */
    public function destinos()
    {
        return $this->hasMany(Destino::class);
    }
}
