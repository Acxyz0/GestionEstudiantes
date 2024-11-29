<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight px-6 rounded-lg shadow-lg">
            {{ __('Editar Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Primer Nombre y Segundo Nombre en la misma fila -->
                            <div>
                                <label for="primerNombre" class="block text-sm font-medium text-gray-700">Primer Nombre</label>
                                <input type="text" name="primerNombre" id="primerNombre" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('primerNombre', $estudiante->primerNombre) }}">
                            </div>
                            <div>
                                <label for="segundoNombre" class="block text-sm font-medium text-gray-700">Segundo Nombre (Opcional)</label>
                                <input type="text" name="segundoNombre" id="segundoNombre" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('segundoNombre', $estudiante->segundoNombre) }}">
                            </div>

                            <!-- Primer Apellido y Segundo Apellido en la misma fila -->
                            <div>
                                <label for="primerApellido" class="block text-sm font-medium text-gray-700">Primer Apellido</label>
                                <input type="text" name="primerApellido" id="primerApellido" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('primerApellido', $estudiante->primerApellido) }}">
                            </div>
                            <div>
                                <label for="segundoApellido" class="block text-sm font-medium text-gray-700">Segundo Apellido (Opcional)</label>
                                <input type="text" name="segundoApellido" id="segundoApellido" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('segundoApellido', $estudiante->segundoApellido) }}">
                            </div>

                            <!-- Carne y Carrera en la misma fila -->
                            <div>
                                <label for="carne" class="block text-sm font-medium text-gray-700">Carné</label>
                                <input type="text" name="carne" id="carne" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('carne', $estudiante->carne) }}">
                            </div>
                            <div>
                                <label for="carrera" class="block text-sm font-medium text-gray-700">Carrera</label>
                                <input type="text" name="carrera" id="carrera" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('carrera', $estudiante->carrera) }}">
                            </div>

                            <!-- Fecha de Nacimiento y Teléfono en la misma fila -->
                            <div>
                                <label for="fechaNacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                                <input type="date" name="fechaNacimiento" id="fechaNacimiento" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('fechaNacimiento', $estudiante->fechaNacimiento) }}">
                            </div>
                            <div>
                                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono (Opcional)</label>
                                <input type="text" name="telefono" id="telefono" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('telefono', $estudiante->telefono) }}">
                            </div>

                            <!-- Correo Electrónico en una fila -->
                            <div class="col-span-2">
                                <label for="correoElectronico" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                                <input type="email" name="correoElectronico" id="correoElectronico" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('correoElectronico', $estudiante->correoElectronico) }}">
                            </div>

                            <!-- Foto en una fila -->
                            <div class="col-span-2">
                                <label for="foto" class="block text-sm font-medium text-gray-700">Foto (Opcional)</label>
                                <input type="file" name="foto" id="foto" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @if ($estudiante->foto)
                                <p class="text-sm text-gray-500 mt-2">Foto actual: <img src="{{ asset('storage/' . $estudiante->foto) }}" alt="Foto de {{ $estudiante->primerNombre }}" class="w-24 h-24 rounded-full mt-2"></p>
                                @endif
                            </div>
                        </div>

                        <!-- Botón de Volver y Submit -->
                        <div class="mt-6 flex justify-between">
                            <!-- Botón de Volver -->
                            <a href="{{ route('estudiantes.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-300">
                                Volver
                            </a>
                            <!-- Botón de Submit -->
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">
                                Actualizar Estudiante
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>