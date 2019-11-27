<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'product_id', 'transaction_id', 'qty', 'amount'
    ];

    public function transaction() {
        return $this->belongsTo(Transaction::class);  
    }

    public function product() {
        return $this->belongsTo(Product::class);  
    }
}
