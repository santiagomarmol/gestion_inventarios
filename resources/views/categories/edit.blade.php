<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
        <div class="py-8">
            <h1 class="text-2xl font-semibold leading-tight">Editar Categoría</h1>

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

                <!-- Formulario de edición -->
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Indicamos que es una actualización -->

                    <!-- Nombre de la Categoría -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nombre de la Categoría
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Descripción de la Categoría -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Descripción
                        </label>
                        <textarea name="description" id="description" rows="4" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Actualizar Categoría
                        </button>
                        <a href="{{ route('categories.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
