<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Business;
use App\Models\Admin;
use App\Models\Transaction;
use App\Models\VisitLog;
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
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $transaksi = Transaction::whereDate('created_at', $today)->get();
        $visit = VisitLog::whereDate('created_at', $today)->get();
        $business = Business::whereDate('created_at', $today)->get();

        $visitLog = [];
        for ($i=1; $i <= 12; $i++) {

            $visitMonth = VisitLog::whereMonth('created_at', $i)->count();

            array_push($visitLog, $visitMonth);
        }

        $registerLog = [];
        for ($i=1; $i <= 12; $i++) {

            $registerMonth = Business::whereMonth('created_at', $i)->count();

            array_push($registerLog, $registerMonth);
        }
        return view('admin.dashboard',
            compact(
                'transaksi',
                'visit',
                'business',
                'year',
                'visitLog',
                'registerLog'
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
        return redirect(route('admin.dashboard'));
    }

    

    
}