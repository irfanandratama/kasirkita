<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\StockHistory;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:cashier');
    }

    public function index()
    {
        $outlet = Auth::user()->outlet_id;
        $history = StockHistory::where('outlet_id', $outlet)->orderBy('id', 'desc')->paginate(10);
        return view('cashier.stock.index',
            compact(
                'history'
            ));
    }

    public function create()
    {
        $outlet = Auth::user()->outlet_id;
        $details = ProductDetail::where('outlet_id', $outlet)->orderBy('id', 'asc')->get();
        return view('cashier.stock.create',
            compact(
                'details'
            ));
    }

    public function store(Request $request)
    {
        $outlet = Auth::user()->outlet_id;
        $cashier = Auth::user()->id;

        $this->validate($request, [
            'product_id' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'note' => 'required', 'string', 'max:255'
        ]);

        $product = ProductDetail::where('outlet_id', $outlet)->where('product_id', $request->get('product_id'))->first();
        if ($request->get('type') == 'masuk') {
            $product->stock += $request->get('quantity');
            $product->save();
        }else {
            $product->stock -= $request->get('quantity');
            $product->save();
        }

        $stock = new StockHistory();
        $stock->product_id = $request->get('product_id');
        $stock->type = $request->get('type');
        $stock->quantity = $request->get('quantity');
        $stock->note = $request->get('note');
        $stock->outlet_id = $outlet;
        $stock->cashier_id = $cashier;
        $stock->save();

        \Session::flash('success', 'Berhasil Menambahkan Data');
        return redirect(route('cashier-stock.index'));
    }

    public function detail($id)
    {
        $history = StockHistory::where('id', $id)->first();
        if(!$history){
            \Session::flash('danger', 'Data tidak ditemukan');
            return redirect(route('management-product.index'));
        }
        return view('cashier.stock.detail',
            compact(
                'history'
            )
        );
    }
}
