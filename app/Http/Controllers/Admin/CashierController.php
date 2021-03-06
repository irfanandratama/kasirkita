<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cashier;
use App\Models\Business;
use App\Models\Outlet;

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

    public function detail($id)
    {
        $cashier = Cashier::where('id', $id)->first();
        $outlets = Outlet::all();
        $businesses = Business::all();
        return view('admin.cashier.detail',
            compact(
                'cashier',
                'outlets',
                'businesses'
        ));
    }
}
