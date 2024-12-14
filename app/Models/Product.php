<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['name', 'description', 'sku', 'price', 'stock_quantity', 'category_id', 'supplier_id'];

    public function movements()
    {
        return $this->hasMany(InventoryMovement::class);
    }

    // En el modelo Product
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
