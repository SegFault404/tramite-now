<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Seguimiento de Trámites
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-center">Tipo de Trámite</th>
                        <th>Estado</th>
                        <th>Estado del Documento</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($tramites as $tramite)
                        @if($tramite->user_id === Auth::id()) <!-- Mostrar solo trámites del usuario autenticado -->
                        <tr class="border-b">
                            <td class="px-6 py-3 text-center">{{ $tramite->tipo_tramite }}</td>
                            <td class="px-6 py-3 text-center">{{ ucfirst($tramite->status) }}</td>
                            <td class="px-6 py-3 text-center">
                                @if($tramite->status === 'aprobado' && $tramite->verificado)
                                    <a href="{{ route('tarjetas.pdf', $tramite->tarjetaCirculacion->id) }}" class="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-500">Ver PDF</a>
                                @else
                                    <span class="text-gray-500">Aún no está lista tu tarjeta</span>
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
