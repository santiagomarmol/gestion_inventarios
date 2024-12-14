<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
        <div class="py-8">
            <h1 class="text-2xl font-semibold leading-tight text-gray-900">Nuevo Pedido</h1>

            <form action="{{ route('orders.store') }}" method="POST" class="mt-6 space-y-6">
                @csrf
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-800">Selecciona los productos</h2>
                    @foreach($products as $product)
                        <div class="flex items-center justify-between p-4 border border-gray-300 rounded-lg hover:bg-gray-50">
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" name="products[{{ $product->id }}][id]" value="{{ $product->id }}" class="product-checkbox" data-id="{{ $product->id }}" data-price="{{ $product->price }}">
                                <span class="text-gray-800 font-medium">{{ $product->name }} - <span class="text-green-600">${{ number_format($product->price, 2) }}</span></span>
                            </div>
                            <input type="number" name="products[{{ $product->id }}][quantity]" placeholder="Cantidad" min="1" class="quantity-input w-20 px-2 py-1 border border-gray-300 rounded-lg" data-id="{{ $product->id }}" disabled>
                        </div>
                    @endforeach
                </div>

                <!-- Resumen del pedido -->
                <div class="mt-6 p-4 border border-gray-300 rounded-lg">
                    <h2 class="text-lg font-semibold text-gray-800">Resumen del Pedido</h2>
                    <div id="order-summary" class="mt-4 text-sm text-gray-600">
                        <p>Selecciona productos para ver el resumen.</p>
                    </div>
                    <p id="total-price" class="font-semibold text-lg mt-4 text-right text-gray-800">Total: $0.00</p>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200">Crear Pedido</button>
            </form>
        </div>
    </div>

    <script>
        // Variables para el manejo del resumen
        const checkboxes = document.querySelectorAll('.product-checkbox');
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const orderSummary = document.getElementById('order-summary');
        const totalPriceDisplay = document.getElementById('total-price');
        
        // Función para actualizar el resumen del pedido
        function updateOrderSummary() {
            let total = 0;
            let summaryContent = '';

            checkboxes.forEach((checkbox, index) => {
                const quantityInput = quantityInputs[index];
                if (checkbox.checked && quantityInput.value > 0) {
                    const productName = checkbox.closest('div').querySelector('span').textContent.trim();
                    const productPrice = parseFloat(checkbox.dataset.price);
                    const quantity = parseInt(quantityInput.value);
                    const productTotal = productPrice * quantity;

                    total += productTotal;
                    summaryContent += `
                        <p>${productName} x ${quantity} - $${productTotal.toFixed(2)}</p>
                    `;
                }
            });

            // Mostrar el resumen
            if (summaryContent) {
                orderSummary.innerHTML = summaryContent;
            } else {
                orderSummary.innerHTML = '<p class="text-gray-600">Selecciona productos para ver el resumen.</p>';
            }

            // Actualizar el total
            totalPriceDisplay.textContent = `Total: $${total.toFixed(2)}`;
        }

        // Evento para activar o desactivar los inputs de cantidad según el estado del checkbox
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const quantityInput = document.querySelector(`.quantity-input[data-id="${checkbox.dataset.id}"]`);
                quantityInput.disabled = !checkbox.checked;
                updateOrderSummary();
            });
        });

        // Evento para actualizar el resumen cuando se cambie la cantidad
        quantityInputs.forEach(input => {
            input.addEventListener('input', updateOrderSummary);
        });

        // Inicializar el resumen al cargar la página
        updateOrderSummary();
    </script>
</x-app-layout>
