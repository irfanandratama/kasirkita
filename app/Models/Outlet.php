<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = [
        'name', 'address', 'business_id'
    ];

    public function cashier() {
        return $this->hasMany(Cashier::class);  
    }

    public function produkDetail() {
        return $this->hasMany(ProductDetail::class);  
    }

    public function stockHistory() {
        return $this->hasMany(StockHistory::class);  
    }
    
    public function transaction() {
        return $this->hasMany(Transaction::class);  
    }
    
    public function business() {
        return $this->belongsTo(Business::class);  
    }
}