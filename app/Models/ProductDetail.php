<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'stock', 'product_id', 'outlet_id'
    ];

    public function outlet() {
        return $this->belongsTo(Outlet::class);  
    }

    public function product() {
        return $this->belongsTo(Product::class)->withTrashed();  
    }
}
