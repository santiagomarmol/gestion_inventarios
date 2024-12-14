<?php

namespace App\Http\Controllers;

use App\Models\InventoryMovement;
use Illuminate\Http\Request;

class InventoryMovementController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
        'movement_type' => 'required|in:in,out',
        'quantity' => 'required|integer',
        'price' => 'required|numeric',
    ]);

    $movement = InventoryMovement::create($validated);

    // Actualizar el stock del producto según el tipo de movimiento
    $product = $movement->product;
    if ($movement->movement_type == 'in') {
        $product->increment('stock_quantity', $movement->quantity);
    } else {
        $product->decrement('stock_quantity', $movement->quantity);
    }

    return redirect()->route('inventory.movements.index');
}

}
