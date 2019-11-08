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

    public function produk() {
        return $this->hasMany(DetailProduct::class);  
    }
}