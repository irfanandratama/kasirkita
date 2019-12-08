<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\TransactionDetail;
use Auth;
use Carbon\Carbon;
use DB;

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

        $transaksi = Transaction::whereIn('outlet_id', $outlet)->whereDate('created_at', $today)->get();

        $transactionRecord = [];
        for ($i=1; $i <= 12; $i++) {

            $transaction = Transaction::whereIn('outlet_id', $outlet)->whereMonth('created_at', $i)->count();

            array_push($transactionRecord, $transaction);
        }

        $product = Product::where('business_id', $bisnis)->pluck('id');
        $topProduct = TransactionDetail::whereIn('product_id', $product)
            ->whereYear('created_at', $year)
            ->select(DB::raw('SUM(qty) as qty'), DB::raw('COUNT(id) as cnt'), 'product_id')
            ->groupBy('product_id')
            ->orderBy('qty', 'desc')
            ->take(5)
            ->get();

        $transactionInMonth = Transaction::whereIn('outlet_id', $outlet)->whereMonth('created_at', $month)->count();
        $transactionInYear = Transaction::whereIn('outlet_id', $outlet)->whereYear('created_at', $year)->count();
        // return $transaksi;
        return view('management.dashboard',
            compact(
                'totalToday',
                'totalMonth',
                'transaksi',
                'transactionRecord',
                'year',
                'topProduct',
                'transactionInYear',
                'transactionInMonth'
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