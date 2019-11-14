<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'product_id', 'type', 'quantity', 'note'
    ];

    public function product() {
        return $this->belongsTo(Product::class);  
    }

    public function outlet() {
        return $this->belongsTo(Outlet::class);  
    }

    public function cashier() {
        return $this->belongsTo(Cashier::class);  
    }
}
