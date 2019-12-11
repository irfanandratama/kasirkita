<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cashier;

class CashierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $cashier = Cashier::paginate(10);
        return view('admin.cashier.index',
            compact(
                'cashier'
        ));
    }
}
