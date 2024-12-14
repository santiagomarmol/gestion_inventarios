<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function sales()
    {
        $salesData = Order::selectRaw('DATE(created_at) as date, SUM(total) as total_sales')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

        $topProducts = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->selectRaw('products.name, SUM(order_items.quantity) as total_quantity')
            ->groupBy('products.name')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();

        return view('reports.sales', compact('salesData', 'topProducts'));
    }

    public function inventory()
    {
        // Productos con bajo inventario (por ejemplo, menos de 10 unidades)
        $lowStockProducts = Product::where('stock_quantity', '<=', 10)
            ->orderBy('stock_quantity', 'asc')
            ->get();
    
        // Resumen general del inventario
        $inventorySummary = Product::selectRaw('
            COUNT(*) as total_products,
            SUM(stock_quantity) as total_stock,
            SUM(price * stock_quantity) as total_value
        ')->first();
    
        return view('reports.inventory', compact('lowStockProducts', 'inventorySummary'));
    }
    
    public function customers()
    {
        $topCustomers = User::join('orders', 'users.id', '=', 'orders.user_id')
            ->selectRaw('users.name, COUNT(orders.id) as total_orders, SUM(orders.total) as total_spent')
            ->groupBy('users.name')
            ->orderBy('total_spent', 'desc')
            ->limit(5)
            ->get();

        return view('reports.customers', compact('topCustomers'));
    }


    
}
