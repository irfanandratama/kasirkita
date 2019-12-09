<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:cashier');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet = Auth::user()->outlet_id;
        $today = Carbon::today()->format('Y-m-d');
        $transaksi = Transaction::where('outlet_id', $outlet)->whereDate('created_at', $today)->orderBy('created_at', 'desc')->get();
        $totalToday = Transaction::where('outlet_id', $outlet)->whereDate('created_at', $today)->sum('total');

        return view('cashier.dashboard',
            compact(
                'transaksi',
                'totalToday'
            )
        );
    }
    /**
     * redirect to dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return redirect(route('cashier.dashboard'));
    }
}