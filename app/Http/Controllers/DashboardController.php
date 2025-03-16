<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $countProductosPorCategorias = Category::withCount('products')->get();
        $productos = Product::all();

        return Inertia::render('Inicio', [
            'countProductosPorCategorias' => $countProductosPorCategorias,
            'productos' => $productos
        ]);
    }
}
