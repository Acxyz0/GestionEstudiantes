<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight px-6 rounded-lg shadow-lg">
            {{ __('GESTIÓN DE ESTUDIANTES') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold text-gray-700">Lista de Estudiantes</h3>
                        <a href="{{ route('estudiantes.create') }}" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition duration-300">Crear Estudiante</a>
                    </div>

                    <table class="min-w-full bg-white divide-y divide-gray-200 rounded-lg shadow-md">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nombre Completo</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Teléfono</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Carrera</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Fecha Nacimiento</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($estudiantes as $estudiante)
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <!-- Concatenación del nombre completo -->
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                                    {{ $estudiante->primerNombre }}
                                    @if($estudiante->segundoNombre)
                                    {{ $estudiante->segundoNombre }}
                                    @endif
                                    {{ $estudiante->primerApellido }}
                                    @if($estudiante->segundoApellido)
                                    {{ $estudiante->segundoApellido }}
                                    @endif
                                </td>
                                <!-- Email -->
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $estudiante->correoElectronico }}</td>
                                <!-- Teléfono -->
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $estudiante->telefono }}</td>
                                <!-- Carrera -->
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $estudiante->carrera }}</td>
                                <!-- Fecha de Nacimiento -->
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ \Carbon\Carbon::parse($estudiante->fechaNacimiento)->format('d/m/Y') }}</td>

                                <!-- Acciones -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-4">
                                    <a href="{{ route('estudiantes.show', $estudiante) }}" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('estudiantes.edit', $estudiante) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if ($estudiante->estado == 1)
                                    <!-- Botón para marcar como inactivo -->
                                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300 flex items-center space-x-2">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @else
                                    <!-- Botón para marcar como activo -->
                                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition duration-300 flex items-center space-x-2">
                                            <i class="fas fa-undo-alt"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $estudiantes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>