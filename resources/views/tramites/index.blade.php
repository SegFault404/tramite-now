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
                        <th>Tarjeta de Identificación Vehicular</th>
                        <th>Licencia</th>
                        <th>SOAT</th>
                        <th>Certificación Técnica</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($tramites as $tramite)
                        <tr class="border-b">
                            <td class="px-6 py-3 text-center">{{ $tramite->user->name }}</td>
                            <td class="px-6 py-3 text-center">{{ $tramite->tipo_tramite }}</td>
                            <td class="px-6 py-3 text-center">
                                <a href="#" onclick="openImageModal('{{ asset('storage/' . $tramite->idvehicular_path) }}')"
                                   class="text-blue-500 hover:underline">Ver Tarjeta Identificación Vehicular</a>
                            </td>
                            <td class="px-6 py-3 text-center">
                                <a href="#" onclick="openImageModal('{{ asset('storage/' . $tramite->licencia_path) }}')"
                                   class="text-blue-500 hover:underline">Ver Licencia</a>
                            </td>
                            <td class="px-6 py-3 text-center">
                                <a href="#" onclick="openImageModal('{{ asset('storage/' . $tramite->soat_path) }}')"
                                   class="text-blue-500 hover:underline">Ver SOAT</a>
                            </td>
                            <td class="px-6 py-3 text-center">
                                <a href="#" onclick="openImageModal('{{ asset('storage/' . $tramite->certificacion_path) }}')"
                                   class="text-blue-500 hover:underline">Ver Certificación</a>
                            </td>
                            <td class="px-6 py-3 text-center">{{ ucfirst($tramite->status) }}</td>
                            <td class="px-6 py-3 text-center">
                                <form action="{{ route('tramites.updateStatus', $tramite->id) }}" method="POST"
                                      class="flex flex-row items-center space-x-3">
                                    @csrf
                                    <select name="status" class="form-select w-auto text-sm">
                                        <option value="aprobado">Aprobar</option>
                                        <option value="rechazado">Rechazar</option>
                                    </select>
                                    <button type="submit" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">
                                        Actualizar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para visor de imágenes -->
    <div id="imageModal" 
        class="fixed inset-0 hidden z-50 bg-black bg-opacity-80 flex justify-center items-center p-4"
        onclick="closeImageModalOutside(event)">
        
        <div class="relative max-w-5xl max-h-full flex flex-col items-center">
            <button onclick="closeImageModal()"
                class="absolute -top-10 right-0 bg-red-600 text-white text-2xl rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-700 transition-colors shadow-lg">
                &times;
            </button>

            <img id="modalImage" 
                class="rounded-lg shadow-2xl object-contain max-w-[95vw] max-h-[85vh] border-2 border-white/20" 
                alt="Imagen ampliada">
        </div>
    </div>

    <script>
        function openImageModal(imageUrl) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl;
            modal.classList.remove('hidden');
            // Bloquear el scroll del body al abrir
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            document.getElementById('modalImage').src = '';
            // Restaurar el scroll del body
            document.body.style.overflow = 'auto';
        }

        // Nueva función: cerrar si se hace clic en el fondo negro
        function closeImageModalOutside(event) {
            const modal = document.getElementById('imageModal');
            if (event.target === modal) {
                closeImageModal();
            }
        }
    </script>
</x-app-layout>
