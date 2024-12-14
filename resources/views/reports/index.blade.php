<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8 max-w-7xl">
        <div class="py-8">
            <h1 class="text-2xl font-semibold leading-tight">Informes y Análisis</h1>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-6">
                <a href="{{ route('reports.sales') }}" class="p-4 border border-gray-300 rounded-lg hover:bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">Informe de Ventas</h2>
                    <p class="text-sm text-gray-600">Revisión de ingresos y productos más vendidos.</p>
                </a>
                <a href="{{ route('reports.inventory') }}" class="p-4 border border-gray-300 rounded-lg hover:bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">Informe de Inventario</h2>
                    <p class="text-sm text-gray-600">Estado de stock y productos con bajo inventario.</p>
                </a>
                <a href="{{ route('reports.customers') }}" class="p-4 border border-gray-300 rounded-lg hover:bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">Informe de Clientes</h2>
                    <p class="text-sm text-gray-600">Análisis de clientes frecuentes y su comportamiento.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
