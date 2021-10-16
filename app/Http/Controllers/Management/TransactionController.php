<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Outlet;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Barber;

use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $barber = Barber::all();
        if (!$outlet->isEmpty()) {
            $barber = Barber::where('outlet_id', $outlet)->get();
        }
        $transactions = Transaction::whereIn('outlet_id', $outlet)
            ->orderBy('created_at', 'desc');

        $sumIncome = $transactions->sum('total');
        $transaction = $transactions
            ->paginate(10);

        // return $transaction;
        return view('management.transaction.index',
            compact(
                'transaction',
                'barber',
                'sumIncome'
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

    public function filter(Request $request)
    {
        if ($request->has('search')) {
            return $this->search($request);
        }
        elseif ($request->has('excel')) {
            return $this->export($request);
        }
    }

    public function search(Request $request)
    {
        $bisnis = Auth::user()->business_id;
        $outlet = Outlet::where('business_id', $bisnis)->pluck('id');
        $barber = Barber::where('outlet_id', $outlet)->get();

        $datef = $request->get('date-from');
        $datet = $request->get('date-to');
        $barber_id = $request->get('barber_id');
        $transactions = Transaction::whereIn('outlet_id', $outlet)
            ->when($datef, function ($query, $datef) {
                $query->whereDate('created_at', '>=', $datef);
            })
            ->when($datet, function ($query, $datet) {
                $query->whereDate('created_at', '<=', $datet);
            })
            ->when($barber_id, function ($query, $barber_id) {
                $query->where('barber_id', $barber_id);
            })
            ->orderBy('created_at', 'desc');
        
        $sumIncome = $transactions->sum('total');
        $transaction = $transactions
            ->paginate(10);
        // return $transaction;
        return view('management.transaction.index',
            compact(
                'transaction',
                'barber',
                'sumIncome'
            ));
    }

    public function export(Request $request)
    {
        $bisnis = Auth::user()->business_id;
        $outlet = Outlet::where('business_id', $bisnis)->pluck('id');

        return Excel::download(new TransactionsExport($outlet, $request), 'transactions.xlsx');
    }
}
