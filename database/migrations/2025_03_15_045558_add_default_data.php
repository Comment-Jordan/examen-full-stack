<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /* ********** Insertar datos por defecto en la tabla categories ********** */

        // Insertar categorías en la tabla categories
        DB::table('categories')->insert([
            ['name' => 'Hilos de algodon'],
            ['name' => 'Hilos sinteticos'],
            ['name' => 'Hilos de seda'],
        ]);

        // Insertar productos en la tabla products
        DB::table('products')->insert([
            ['name' => 'Hilo de algodón blanco', 'stock' => 500, 'category_id' => 1],
            ['name' => 'Hilo de algodón negro', 'stock' => 300, 'category_id' => 1],
            ['name' => 'Hilo sintético colorido', 'stock' => 50, 'category_id' => 2],            
            ['name' => 'Hilo de seda teñido', 'stock' => 150, 'category_id' => 3],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar los datos por defecto
        DB::table('products')->whereIn('name', ['Smartphone', 'Laptop', 'T-Shirt', 'Jeans', 'Sofa', 'Dining Table'])->delete();
        DB::table('categories')->whereIn('name', ['Electronics', 'Clothing', 'Furniture'])->delete();
    }
};
