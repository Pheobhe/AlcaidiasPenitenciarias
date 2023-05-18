<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValorConsolidado extends Model
{
    use HasFactory;

    protected $table = "valor_consolidado";
    protected $fillable = ['total', 'categoria', 'cantFem', 'cantMasc', 'cantTrans'];
   

    public function categoria()
    {
        return $this->hasOne(Categoria::class);
    }

    public function parte()
    {
        return $this->hasOne(Parte::class);
    }
}
