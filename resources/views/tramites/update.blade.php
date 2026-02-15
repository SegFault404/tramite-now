<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Actualizar Estado y Generar Tarjeta
            </h2>
            <a href="{{ route('tramites.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Regresar</a>
        </div>
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
                </tbody>

            </table>
        </div>
    </div>

    @if ($tramite->status === 'aprobado' && !$tramite->verified)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Generar Tarjeta de Circulación</h3>
                    <form action="{{ route('tarjetas.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="tramite_id" value="{{ $tramite->id }}">

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-lg font-medium">EMPRESA / ASOCIACIÓN</label>
                                <div class="my-3">
                                    <input type="text" name="empresa_asociacion" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>

                            <div>
                                <label class="text-lg font-medium">RAZÓN SOCIAL</label>
                                <div class="my-3">
                                    <input type="text" name="razon_social" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>
                            
                            <div>
                                <label class="text-lg font-medium">VEHÍCULO</label>
                                <div class="my-3">
                                    <input type="text" name="vehiculo" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>
                            
                            <div>
                                <label class="text-lg font-medium">PLACA</label>
                                <div class="my-3">
                                    <input type="text" name="placa" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>

                            
                            <div>
                                <label class="text-lg font-medium">COLOR</label>
                                <div class="my-3">
                                    <input type="text" name="color" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>

                            <div>
                                <label class="text-lg font-medium">MARCA</label>
                                <div class="my-3">
                                    <input type="text" name="marca" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>


                            <div>
                                <label class="text-lg font-medium">CHASIS</label>
                                <div class="my-3">
                                    <input type="text" name="chasis" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>
                                
                            <div>
                                <label class="text-lg font-medium">TIPO DE SERVICIO</label>
                                <div class="my-3">
                                    <input type="text" name="tipo_servicio" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>

                            <div>
                                <label class="text-lg font-medium">N° DE MOTOR</label>
                                <div class="my-3">
                                    <input type="text" name="numero_motor" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>

                            <div>
                                <label class="text-lg font-medium">FECHA DE EXPEDICIÓN:</label>
                                <div class="my-3">
                                    <input type="date" name="fecha_expedicion" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>
                                
                            <div>
                                <label class="text-lg font-medium">FECHA DE VENCIMIENTO:</label>
                                <div class="my-3">
                                    <input type="date" name="fecha_vencimiento" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">
                            Generar Tarjeta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal para visor de imágenes -->
    <div id="imageModal" class="fixed inset-0 hidden z-50 bg-black bg-opacity-75 flex justify-center items-center">
        <div class="relative">
            <!-- Imagen dentro del modal -->
            <img id="modalImage" class="max-w-screen-sm max-h-screen rounded-lg" alt="Imagen">
            <!-- Botón para cerrar -->
            <button onclick="closeImageModal()"
                class="absolute top-3 right-3 bg-red-500 text-white text-sm rounded-full px-3 py-1 hover:bg-red-600 focus:outline-none">
                &times;
            </button>
        </div>
    </div>

    

    <!-- Scripts para abrir y cerrar el modal -->
    <script>
        function openImageModal(imageUrl) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl; // Establece la URL de la imagen
            modal.classList.remove('hidden'); // Muestra el modal
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden'); // Oculta el modal
            document.getElementById('modalImage').src = ''; // Limpia la fuente de la imagen
        }
    </script>
</x-app-layout>
