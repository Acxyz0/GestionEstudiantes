<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::paginate(10);
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'primerNombre' => 'required|string|max:255',
            'segundoNombre' => 'nullable|string|max:255',
            'tercerNombre' => 'nullable|string|max:255',
            'primerApellido' => 'required|string|max:255',
            'segundoApellido' => 'nullable|string|max:255',
            'carne' => 'required|string|unique:estudiantes,carne',
            'carrera' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'correoElectronico' => 'required|email|unique:estudiantes,correoElectronico',
            'telefono' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $datos = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreFoto = time() . '_' . $foto->getClientOriginalName();
            $rutaFoto = $foto->storeAs('foto_estudiantes', $nombreFoto, 'public');
            $datos['foto'] = $rutaFoto;
        }

        Estudiante::create($datos);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
    }

    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    // EstudianteController.php

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'primerNombre' => 'required|string|max:255',
            'segundoNombre' => 'nullable|string|max:255',
            'tercerNombre' => 'nullable|string|max:255',
            'primerApellido' => 'required|string|max:255',
            'segundoApellido' => 'nullable|string|max:255',
            'apellidoCasada' => 'nullable|string|max:255',
            'carne' => 'required|string|unique:estudiantes,carne,' . $estudiante->id,
            'carrera' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'correoElectronico' => 'required|email|unique:estudiantes,correoElectronico,' . $estudiante->id,
            'telefono' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Excluir campos que no deseamos registrar en la bitácora
        $datos = $request->except(['_token', '_method']);
        $cambios = [];

        // Comparar cada campo enviado con el valor actual y guardar solo los cambios
        foreach ($datos as $campo => $valor) {
            if ($estudiante->$campo != $valor) {
                $cambios[] = "Campo $campo cambió de '{$estudiante->$campo}' a '$valor'";
            }
        }

        // Manejo de la imagen si se sube una nueva
        if ($request->hasFile('foto')) {
            if ($estudiante->foto) {
                Storage::disk('public')->delete($estudiante->foto);
            }

            $foto = $request->file('foto');
            $nombreFoto = time() . '_' . $foto->getClientOriginalName();
            $rutaFoto = $foto->storeAs('fotos_estudiantes', $nombreFoto, 'public');
            $datos['foto'] = $rutaFoto;
        }

        // Actualizar el estudiante
        $estudiante->update($datos);

        // Si hubo cambios, registrar en la bitácora
        if (!empty($cambios)) {
            Bitacora::create([
                'idEstudiante' => $estudiante->id,
                'tipoCambio' => 'Edición',
                'detalles' => implode(', ', $cambios),
            ]);
        }

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function destroy(Estudiante $estudiante)
    {
        // Guardar el nombre completo del estudiante
        $nombreCompleto = $estudiante->primerNombre . ' ' . $estudiante->primerApellido;

        // Verificar el estado actual y cambiarlo
        $nuevoEstado = $estudiante->estado == 1 ? 0 : 1;
        $accion = $nuevoEstado == 0 ? 'Eliminación' : 'Restauración';

        // Actualizar el estado del estudiante
        $estudiante->estado = $nuevoEstado;
        $estudiante->save();

        // Registrar en la bitácora el cambio de estado
        Bitacora::create([
            'idEstudiante' => $estudiante->id,
            'tipoCambio' => $accion,
            'detalles' => "El estudiante $nombreCompleto fue marcado como $accion.",
        ]);

        return redirect()->route('estudiantes.index')->with('success', "Estudiante $accion correctamente.");
    }
}
