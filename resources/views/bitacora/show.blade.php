<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Cambio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Detalles del cambio realizado</h3>

                    <p><strong>Estudiante:</strong> {{ $bitacora->estudiante->primerNombre }} {{ $bitacora->estudiante->primerApellido }}</p>
                    <p><strong>Tipo de Cambio:</strong> {{ $bitacora->tipoCambio }}</p>
                    <p><strong>Fecha del Cambio:</strong> {{ \Carbon\Carbon::parse($bitacora->fechaCambio)->format('d/m/Y H:i') }}</p>
                    <p><strong>Detalles:</strong> {{ $bitacora->detalles }}</p>

                    <a href="{{ route('bitacora.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">
                        Volver al listado
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
