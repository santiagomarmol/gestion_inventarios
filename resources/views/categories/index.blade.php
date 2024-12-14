<x-app-layout>
    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto px-4 sm:px-8 max-w-7xl">
                <div class="py-8">

                    <!-- Mensaje de éxito -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Encabezado con título y botón -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-semibold leading-tight">Lista de Categorías</h1>
                        <a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Nueva Categoría
                        </a>
                    </div>

                    <!-- Tabla de categorías -->
                    <div class="overflow-x-auto">
                        <table class="w-full leading-normal border-collapse border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Descripción
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-100 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-300 bg-white text-sm">
                                            {{ $category->name }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-300 bg-white text-sm">
                                            {{ $category->description }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-300 bg-white text-sm text-center">
                                            <a href="{{ route('categories.edit', $category) }}" class="text-blue-500 hover:text-blue-700 mr-3">Editar</a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-5 py-5 border-b border-gray-300 bg-white text-sm text-center">
                                            No se encontraron categorías.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Paginación -->
                        <div class="mt-6">
                            {{ $categories->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
