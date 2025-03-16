<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'stock', 'category_id'];
    // protected $table = 'products';

    // En el modelo Product
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
