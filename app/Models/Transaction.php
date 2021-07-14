<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'cashier_id', 'customer_name', 'total', 'receipt', 'outlet_id', 'barber_id', 'code'
    ];

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }

    public function transactionDetail() {
        return $this->hasMany(TransactiontDetail::class);  
    }

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }

    public function barber(){
        return $this->belongsTo(Barber::class);
    }
}
