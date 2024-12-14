<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8 max-w-7xl">
        <div class="py-8">
            <h1 class="text-2xl font-semibold leading-tight">Informe de Inventario</h1>

            <!-- Resumen del inventario -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-6">
                <div class="p-4 bg-white shadow rounded-lg">
                    <h2 class="text-lg font-semibold text-gray-800">Total de Productos</h2>
                    <p class="text-3xl font-bold text-blue-600">{{ $inventorySummary->total_products }}</p>
                </div>
                <div class="p-4 bg-white shadow rounded-lg">
                    <h2 class="text-lg font-semibold text-gray-800">Unidades en Stock</h2>
                    <p class="text-3xl font-bold text-green-600">{{ $inventorySummary->total_stock }}</p>
                </div>
                <div class="p-4 bg-white shadow rounded-lg">
                    <h2 class="text-lg font-semibold text-gray-800">Valor Total</h2>
                    <p class="text-3xl font-bold text-red-600">${{ number_format($inventorySummary->total_value, 2) }}</p>
                </div>
            </div>

            <!-- Productos con bajo inventario -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold leading-tight">Productos con Bajo Inventario</h2>
                <div class="overflow-x-auto mt-4">
                    <table class="w-full leading-normal border border-gray-300">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Producto
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Stock Actual
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Precio Unitario
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Valor Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lowStockProducts as $product)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-300 bg-white text-sm">
                                        {{ $product->name }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 bg-white text-sm">
                                        {{ $product->stock_quantity }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 bg-white text-sm">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 bg-white text-sm">
                                        ${{ number_format($product->price * $product->stock_quantity, 2) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-5 py-5 border-b border-gray-300 bg-white text-sm text-center">
                                        No hay productos con bajo inventario.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
