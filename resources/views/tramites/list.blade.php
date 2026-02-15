<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Trámites Pendientes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-center">Usuario</th>
                        <th>Tipo de Trámite</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($tramites as $tramite)
                        <tr class="border-b">
                            <td class="px-6 py-3 text-center">{{ $tramite->user->name }}</td>
                            <td class="px-6 py-3 text-center">{{ $tramite->tipo_tramite }}</td>
                            <td class="px-6 py-3 text-center">{{ ucfirst($tramite->status) }}</td>
                            <td class="px-6 py-3 text-center">
                                <a href="{{ route('tramites.update',$tramite->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Revisar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
