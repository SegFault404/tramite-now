<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Solicitar Trámite
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{ route('tramites.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="tipo_tramite" class="block font-medium text-gray-800 dark:text-gray-200">Tipo de Trámite</label>
                    <select name="tipo_tramite" id="tipo_tramite" class="mt-1 p-2 border rounded w-full" required>
                        <option value="tarjeta_circulacion_carga_descarga">Tarjeta de Circulación Carga y Descarga</option>
                        <option value="tarjeta_circulacion_mototaxi">Tarjeta de Circulación Mototaxi</option>
                        <option value="tarjeta_circulacion_automoviles">Tarjeta de Circulación Automóviles</option>
                    </select>
                    @error('tipo_tramite') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="idvehicular" class="block font-medium text-gray-800 dark:text-gray-200">Tarjeta de Identificación Vehicular</label>
                    <input type="file" name="idvehicular" id="idvehicular" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200">
                    @error('idvehicular') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="licencia" class="block font-medium text-gray-800 dark:text-gray-200">Licencia de Conducir</label>
                    <input type="file" name="licencia" id="licencia" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200">
                    @error('licencia') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="soat" class="block font-medium text-gray-800 dark:text-gray-200">SOAT</label>
                    <input type="file" name="soat" id="soat" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200">
                    @error('soat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="certificacion" class="block font-medium text-gray-800 dark:text-gray-200">Certificación o Revisión Técnica</label>
                    <input type="file" name="certificacion" id="certificacion" class="mt-1 p-2 border rounded w-full text-gray-800 dark:text-gray-200">
                    @error('certificacion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
                    Solicitar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
