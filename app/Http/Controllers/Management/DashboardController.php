<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Outlet;
use Auth;

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
        $total = Transaction::where('outlet_id', $outlet)->whereR("DAY(created_at) = '" . Carbon::yesterday()->format('Y-m-d') . "'")->sum('total');
        return view('management.dashboard',
            compact(
                'total'
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