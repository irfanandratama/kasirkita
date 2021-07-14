<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Outlet;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Barber;

class HistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:cashier');
    }

    public function index()
    {
        $outlet = Auth::user()->outlet_id;
        $transaction = Transaction::where('outlet_id', $outlet)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $barber = Barber::where('outlet_id', $outlet)->get();
        // return $transaction;
        return view('cashier.history.index',
            compact(
                'transaction',
                'barber'
            ));
    }

    public function detail($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $detail = TransactionDetail::where('transaction_id', $id)->get();

        // return $detail;
        return view('cashier.history.detail',
            compact(
                'transaction',
                'detail'
            )
        );
    }
}
