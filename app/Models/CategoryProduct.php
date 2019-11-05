<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'products_categories';
    public $timestamps = true;

    protected $fillable = [
        'name', 'business_id',
    ];

    public function business() {
        return $this->belongsTo(Business::class);
    }

    public function produk() {
        return $this->hasMany(Product::class);  
    }
}
