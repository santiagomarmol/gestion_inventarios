<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8 max-w-7xl">
        <div class="py-8">
            <h1 class="text-2xl font-semibold leading-tight">Informe de Ventas</h1>
            <h2 class="text-lg font-semibold text-gray-800 mt-6">Ventas por Fecha</h2>
            <table class="mt-4 w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Fecha</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Total de Ventas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salesData as $data)
                        <tr>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $data->date }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">${{ number_format($data->total_sales, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2 class="text-lg font-semibold text-gray-800 mt-6">Productos Más Vendidos</h2>
            <ul class="mt-4 space-y-2">
                @foreach ($topProducts as $product)
                    <li class="text-gray-700">{{ $product->name }} - {{ $product->total_quantity }} vendidos</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
