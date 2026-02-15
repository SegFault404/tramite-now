<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Historial de Tramites
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <table class="table-auto w-full">
                    <thead class="bg-gray-50">
                        <tr class="border-b">
                            <th class="px-6 py-3 text-center">Usuario</th>
                            <th>Tipo de Trámite</th>
                            <th>Tarjeta de Identificación Vehicular</th>
                            <th>Licencia</th>
                            <th>SOAT</th>
                            <th>Certificación Técnica</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($tramites as $tramite)
                            <tr>
                                <td class="px-6 py-3 text-center">{{ $tramite->user->name }}</td>
                                <td class="px-6 py-3 text-center">{{ $tramite->tipo_tramite }}</td>
                                <td class="px-6 py-3 text-center"><a href="{{ asset('storage/' . $tramite->idvehicular_path) }}" target="_blank">Ver Tarjeta Identificación Vehicular</a></td>
                                <td class="px-6 py-3 text-center"><a href="{{ asset('storage/' . $tramite->licencia_path) }}" target="_blank">Ver Licencia</a></td>
                                <td class="px-6 py-3 text-center"><a href="{{ asset('storage/' . $tramite->soat_path) }}" target="_blank">Ver SOAT</a></td>
                                <td class="px-6 py-3 text-center"><a href="{{ asset('storage/' . $tramite->certificacion_path) }}" target="_blank">Ver Certificación</a></td>
                                <td class="px-6 py-3 text-center">{{ ucfirst($tramite->status) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</x-app-layout>
