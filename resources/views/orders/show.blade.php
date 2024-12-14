<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
        <div class="py-8">
            <h1 class="text-2xl font-semibold leading-tight mb-4">Detalles del Pedido</h1>

            <!-- Información del pedido -->
            <div class="bg-white shadow-md rounded px-8 py-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-700">Información del Pedido</h2>
                <p class="text-gray-600"><strong>ID del Pedido:</strong> {{ $order->id }}</p>
                <p class="text-gray-600"><strong>Usuario:</strong> {{ $order->user->name }}</p>
                <p class="text-gray-600"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                <p class="text-gray-600"><strong>Fecha de Creación:</strong> {{ $order->created_at->format('d-m-Y H:i:s') }}</p>
            </div>

            <!-- Productos en el pedido -->
            <div class="bg-white shadow-md rounded px-8 py-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Productos</h2>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Producto</th>
                            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Cantidad</th>
                            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Precio Unitario</th>
                            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">{{ $item->product->name }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">{{ $item->quantity }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">${{ number_format($item->price, 2) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">${{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="border border-gray-300 px-4 py-2 text-right font-bold text-gray-700">Total:</td>
                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">${{ number_format($order->total, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Botón para volver -->
            <div class="mt-6">
                <a href="{{ route('orders.index') }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Volver a la Lista de Pedidos
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
