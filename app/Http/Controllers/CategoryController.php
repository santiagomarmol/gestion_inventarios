<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener las categorías con paginación
        $categories = Category::paginate(10);  // Cambia 10 por la cantidad de categorías por página que prefieras
        return view('categories.index', compact('categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories|max:255',
            'description' => 'nullable|string',
        ]);
    
        Category::create($validated);
    
        return redirect()->route('categories.index')->with('success', 'Categoría creada con éxito.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Mostrar el formulario de edición con la categoría
        return view('categories.edit', compact('category'));
    }
    
    public function update(Request $request, Category $category)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);
    
        // Actualizar la categoría
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    
        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
