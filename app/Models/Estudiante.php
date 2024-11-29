<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $fillable = [
        'primerNombre',
        'segundoNombre',
        'tercerNombre',
        'primerApellido',
        'segundoApellido',
        'apellidoCasada',
        'carne',
        'carrera',
        'fechaNacimiento',
        'correoElectronico',
        'telefono',
        'foto'
    ];

    public function bitacoraCambios()
    {
        return $this->hasMany(Bitacora::class, 'idEstudiante');
    }
}
