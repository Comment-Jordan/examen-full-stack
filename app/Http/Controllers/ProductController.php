<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::with(['categories'])->get()->all();
        return Inertia::render('Product/Index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all();
        return Inertia::render('Product/Create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'category_id' => $request->category_id
        ]);

        $productos = Product::with(['categories'])->get()->all();
        return Inertia::render('Product/Index', ['productos' => $productos]);   
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // No es necesario ya que la información se muestra en el index
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($productoId)
    {
        $producto = Product::find($productoId);
        $categorias = Category::all();
        return Inertia::render('Product/Edit', ['producto' => $producto, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($productoId, Request $request)
    {
        $producto = Product::find($productoId);
        if($producto){
            $producto->name = $request->name;
            $producto->stock = $request->stock;
            $producto->category_id = $request->category_id;
            $producto->save();
        }
        
        $productos = Product::with(['categories'])->get()->all();
        return Inertia::render('Product/Index', ['productos' => $productos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productoId)
    {
        $producto = Product::find($productoId);
        if($producto){
            $producto->delete();
        }
        
        $productos = Product::with(['categories'])->get()->all();
        return Inertia::render('Product/Index', ['productos' => $productos]);
    }
}
