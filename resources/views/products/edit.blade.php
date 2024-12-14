<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
        <div class="py-8">
            <h1 class="text-2xl font-semibold leading-tight">Editar Producto: {{ $product->name }}</h1>

            <div class="mt-6 bg-white shadow-md rounded px-8 py-6">
                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campo Nombre -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            Nombre del Producto
                        </label>
                        <input type="text" name="name" id="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('name', $product->name) }}" required>
                        @error('name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Campo Descripción -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                            Descripción
                        </label>
                        <textarea name="description" id="description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            rows="3">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Campo SKU -->
                    <div class="mb-4">
                        <label for="sku" class="block text-gray-700 text-sm font-bold mb-2">
                            Código SKU
                        </label>
                        <input type="text" name="sku" id="sku"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('sku', $product->sku) }}" required>
                        @error('sku')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Campo Precio -->
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">
                            Precio
                        </label>
                        <input type="number" name="price" id="price"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('price', $product->price) }}" step="0.01" required>
                        @error('price')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Campo Cantidad -->
                    <div class="mb-4">
                        <label for="stock_quantity" class="block text-gray-700 text-sm font-bold mb-2">
                            Cantidad en Inventario
                        </label>
                        <input type="number" name="stock_quantity" id="stock_quantity"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
                        @error('stock_quantity')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Campo Categoría -->
                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
                            Categoría
                        </label>
                        <select name="category_id" id="category_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Campo Proveedor -->
                    <div class="mb-4">
                        <label for="supplier_id" class="block text-gray-700 text-sm font-bold mb-2">
                            Proveedor
                        </label>
                        <select name="supplier_id" id="supplier_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Seleccione un proveedor</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" 
                                    {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Guardar Cambios
                        </button>
                        <a href="{{ route('products.index') }}"
                            class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
