<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name', 'business_type_id',
    ];

    public function manejemen() {
        return $this->hasMany(Management::class);  
    }

    public function businessType() {
        return $this->belongsTo(BusinessType::class);
    }

    public function cashier() {
        return $this->hasMany(Cashier::class);  
    }
}
