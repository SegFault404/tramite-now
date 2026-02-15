<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Crear Usuarios
            </h2>
            <a href="{{ route('users.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Regresar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('users.store')}}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Nombre</label>
                            <div class="my-3">
                                <input value="{{ old('name') }}" name="name" placeholder="Ingresa Nombre" type="text" 
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="" class="text-lg font-medium">Email</label>
                            <div class="my-3">
                                <input value="{{ old('email') }}" name="email" placeholder="Ingresar Correo" type="text" 
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black">
                                @error('email')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="" class="text-lg font-medium">Password</label>
                            <div class="my-3">
                                <input value="{{ old('password') }}" name="password" placeholder="Ingresar Contraseña" type="password" 
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black">
                                @error('password')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="" class="text-lg font-medium">Confirm Password</label>
                            <div class="my-3">
                                <input value="{{ old('confirm_password') }}" name="confirm_password" placeholder="Confirma tu contraseña" type="password" 
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black">
                                @error('confirm_password')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-4 mb-3">
                                @if ($roles ->isNotEmpty())
                                    @foreach ($roles as $role)
                                    <div class="mt-3">
                                        <input type="checkbox" id="role-{{ $role->id }}" class="rounded" name="role[]" value="{{ $role->name }}">
                                        <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
