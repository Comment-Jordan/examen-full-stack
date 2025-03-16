<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::all();
        return Inertia::render('Category/Index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = Category::create([
            'name' => $request->name
        ]);
        
        $categorias = Category::all();
        return Inertia::render('Category/Index', ['categorias' => $categorias]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // No es necesario implementar este método ya que la información se muestra en la vista Index
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categoriaId)
    {
        if ($categoriaId) {
            $categoria = Category::find($categoriaId);
            return Inertia::render('Category/Edit', ['categoria' => $categoria]);
        }
        return redirect()->route('category.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($categoriId, Request $request)
    {
        if ($categoriId) {
            $categoria = Category::find($categoriId);
            $categoria->name = $request->name;
            $categoria->save();
        }
        $categorias = Category::all();
        return Inertia::render('Category/Index', ['categorias' => $categorias]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoriaId)
    {
        if ($categoriaId) {
            $categoria = Category::find($categoriaId);
            $categoria->delete();
        }
        $categorias = Category::all();
        return Inertia::render('Category/Index', ['categorias' => $categorias]);
    }
}
