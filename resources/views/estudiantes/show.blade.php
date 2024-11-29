<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight px-6 rounded-lg shadow-lg">
            {{ __('Detalles del Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg p-6">
                <div class="flex flex-col md:flex-row items-start space-y-6 md:space-y-0 md:space-x-8">

                    <!-- Imagen del Estudiante -->
                    <div class="flex-shrink-0">
                        @if ($estudiante->foto)
                        <img src="{{ asset('storage/' . $estudiante->foto) }}" alt="Foto de {{ $estudiante->primerNombre }}" class="w-32 h-32 object-cover rounded-full mx-auto">
                        @else
                        <img src="{{ asset('img/default-user.png') }}" alt="Foto por defecto" class="w-48 h-48 rounded-full shadow-lg">
                        @endif
                    </div>

                    <!-- Información del Estudiante -->
                    <div class="flex-grow">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <!-- Nombre Completo Concatenado -->
                            <h3 class="text-2xl font-semibold text-gray-700 mb-4">
                                {{ $estudiante->primerNombre }}
                                @if($estudiante->segundoNombre)
                                {{ $estudiante->segundoNombre }}
                                @endif
                                {{ $estudiante->primerApellido }}
                                @if($estudiante->segundoApellido)
                                {{ $estudiante->segundoApellido }}
                                @endif
                            </h3>

                            <!-- Carrera -->
                            <p class="text-lg text-gray-600 mb-4"><strong>Carrera:</strong> {{ $estudiante->carrera }}</p>

                            <!-- Carné -->
                            <p class="text-lg text-gray-600 mb-4"><strong>Carné:</strong> {{ $estudiante->carne }}</p>

                            <!-- Email -->
                            <p class="text-lg text-gray-600 mb-4"><strong>Email:</strong> {{ $estudiante->correoElectronico }}</p>

                            <!-- Teléfono -->
                            @if($estudiante->telefono)
                            <p class="text-lg text-gray-600 mb-4"><strong>Teléfono:</strong> {{ $estudiante->telefono }}</p>
                            @endif

                            <!-- Fecha de Nacimiento -->
                            <p class="text-lg text-gray-600 mb-4"><strong>Fecha de Nacimiento:</strong> {{ \Carbon\Carbon::parse($estudiante->fechaNacimiento)->format('d/m/Y') }}</p>
                        </div>

                        <!-- Botones de acciones -->
                        <div class="mt-6 flex space-x-4">
                            <a href="{{ route('estudiantes.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition duration-300">Volver</a>
                            <a href="{{ route('estudiantes.edit', $estudiante) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Editar</a>
                            <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300" onclick="return confirm('¿Estás seguro de querer eliminar este estudiante?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>