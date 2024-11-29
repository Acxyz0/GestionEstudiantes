<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $table = 'bitacora';

    public $timestamps = false;

    protected $fillable = [
        'idEstudiante',
        'tipoCambio',
        'detalles',
        'fechaCambio'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idEstudiante');
    }
}
