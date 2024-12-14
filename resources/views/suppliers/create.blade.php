<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
        <div class="py-8">
            <h1 class="text-2xl font-semibold leading-tight">Crear Nuevo Proveedor</h1>

            <div class="mt-6 bg-white shadow-md rounded px-8 py-6">
                <!-- Mensaje de error si hay algún fallo -->
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario de creación -->
                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf

                    <!-- Nombre del Proveedor -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nombre del Proveedor
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Dirección del Proveedor -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">
                            Dirección
                        </label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        @error('address')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Teléfono del Proveedor -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">
                            Teléfono
                        </label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Correo Electrónico del Proveedor -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Correo Electrónico
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botón de Envío -->
                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Crear Proveedor
                        </button>
                        <a href="{{ route('suppliers.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
