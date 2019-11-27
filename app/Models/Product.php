<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
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

    public function transactionDetail() {
        return $this->hasMany(transactionDetail::class);  
    }
}