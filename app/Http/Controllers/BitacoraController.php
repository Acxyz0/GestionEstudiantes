<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    /**
     * Muestra el listado de registros en la bitácora.
     */
    public function index()
    {
        // Obtener todos los registros de la bitácora paginados
        $bitacoras = Bitacora::with('estudiante')->paginate(10);

        // Retornar la vista 'bitacora.index' pasando los datos paginados
        return view('bitacora.index', compact('bitacoras'));
    }

    /**
     * Muestra los detalles de un registro específico de la bitácora.
     */
    public function show(string $id)
    {
        // Buscar el registro de la bitácora por su ID
        $bitacora = Bitacora::with('estudiante')->findOrFail($id);

        // Retornar la vista 'bitacora.show' con los detalles del registro
        return view('bitacora.show', compact('bitacora'));
    }
}
