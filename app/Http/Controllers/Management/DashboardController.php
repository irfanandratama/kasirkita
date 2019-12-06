<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Outlet;
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
        $this->middleware('auth:management');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bisnis = Auth::user()->business_id;
        $outlet = Outlet::where('business_id', $bisnis)->pluck('id');
        $today = Carbon::today()->format('Y-m-d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        // $totalToday = Transaction::whereIn('outlet_id', $outlet)->whereRaw('Date(created_at) = CURDATE()')->sum('total');
        $totalToday = Transaction::whereIn('outlet_id', $outlet)->whereDate('created_at', $today)->sum('total');

        $totalMonth = Transaction::whereIn('outlet_id', $outlet)->whereMonth('created_at', $month)->sum('total');

        $transaksi = Transaction::whereIn('outlet_id', $outlet)->whereDate('created_at', $today)->count();

        $transactionRecord = [];
        for ($i=1; $i <= 12; $i++) {

            $transaction = Transaction::whereIn('outlet_id', $outlet)->whereMonth('created_at', $i)->count();

            array_push($transactionRecord, $transaction);
        }
        // return $transactionRecord;
        return view('management.dashboard',
            compact(
                'totalToday',
                'totalMonth',
                'transaksi',
                'transactionRecord'
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
        return redirect(route('management.dashboard'));
    }
}