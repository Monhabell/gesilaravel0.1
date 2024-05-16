<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;
    protected $table = 'bases'; // Nombre de tu tabla personalizado

    protected $fillable = [
        'nombrebase',
        'tiempoencabezado',
        'tiempoindseg',
        'entorno_id',
    ];

    public function entorno()
    {
        return $this->belongsTo(Entorno::class);
    }
}