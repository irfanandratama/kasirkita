<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public $timestamps = true;

    protected $fillable = [
        'name', 'image', 'price', 'category_id', 'business_id'
    ];

    public function category() {
        return $this->belongsTo(CategoryProduct::class);  
    }

    public function productDetail() {
        return $this->hasMany(ProductDetail::class);  
    }

    public function stockHistory() {
        return $this->hasMany(StockHistory::class);  
    }
}