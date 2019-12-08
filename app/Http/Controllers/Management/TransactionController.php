<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Outlet;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:management');
    }

    public function index()
    {
        $bisnis = Auth::user()->business_id;
        $outlet = Outlet::where('business_id', $bisnis)->pluck('id');
        $transaction = Transaction::whereIn('outlet_id', $outlet)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // return $transaction;
        return view('management.transaction.index',
            compact(
                'transaction'
            ));
    }

    public function detail($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $detail = TransactionDetail::where('transaction_id', $id)->get();

        // return $detail;
        return view('management.transaction.detail',
            compact(
                'transaction',
                'detail'
            )
        );
    }
}
