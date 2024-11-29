<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight px-6 rounded-lg shadow-lg">
            {{ __('BITÁCORA DE CAMBIOS') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold text-gray-700">Historial de Cambios</h3>
                    </div>

                    <table class="min-w-full bg-white divide-y divide-gray-200 rounded-lg shadow-md">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Estudiante</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tipo de Cambio</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($bitacoras as $bitacora)
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $bitacora->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                                    {{ $bitacora->estudiante->primerNombre }} {{ $bitacora->estudiante->primerApellido }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $bitacora->tipoCambio }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ \Carbon\Carbon::parse($bitacora->fechaCambio)->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium flex space-x-4">
                                    <a href="{{ route('bitacora.show', $bitacora->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300 flex items-center">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $bitacoras->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
