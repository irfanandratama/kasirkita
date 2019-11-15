<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitLog extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'ip_address'
    ];
}
