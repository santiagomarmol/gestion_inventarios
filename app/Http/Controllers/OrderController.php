<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);
    
        $total = 0;
    
        // Verificar y calcular el total del pedido
        foreach ($validated['products'] as $item) {
            $product = Product::find($item['id']);
    
            // Verificar si hay suficiente stock
            if ($product->stock_quantity < $item['quantity']) {
                return redirect()->back()->withErrors([
                    'stock' => "El producto '{$product->name}' no tiene suficiente stock disponible.",
                ]);
            }
    
            $total += $product->price * $item['quantity'];
        }
    
        // Crear el pedido
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
        ]);
    
        // Crear los items del pedido y actualizar el stock
        foreach ($validated['products'] as $item) {
            $product = Product::find($item['id']);
    
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ]);
    
            // Reducir el stock del producto
            $product->decrement('stock_quantity', $item['quantity']);
        }
    
        return redirect()->route('orders.index')->with('success', 'Pedido creado con éxito.');
    }
    
    

    public function show(Order $order)
    {
        $order->load('items.product');
        return view('orders.show', compact('order'));
    }
}
