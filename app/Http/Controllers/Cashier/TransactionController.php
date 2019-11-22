<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\VisitLog;
use stdClass;
use PDF;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:cashier');
    }
    
    public function index()
    {
        $outlet = Auth::user()->outlet_id;
        $produk = ProductDetail::where('outlet_id', $outlet)->orderBy('id', 'asc')->get();
        return view('cashier.transaction.index',
            compact(
                'produk'
            )
        );
    }

    public function invoice(Request $request)
    {
        $item = $request->get('item');
        $qty = $request->get('qty');
        $product_id =$request->get('product');
        
        $products = [];
        for ($i=0; $i < $item; $i++) {

            $product = new stdClass();
            
            $quantity = $qty[$i];
            $id = $product_id[$i];

            $find_product=Product::find($id);

            $product->item = $find_product;
            $product->qty = $quantity;

            array_push($products, $product);
        }

        return view('cashier.transaction.invoice',
            compact(
                'products',
                'item'
            )
        );
    }

    public function store(Request $request)
    {
        $cashier_id = Auth::user()->id;
        $outlet_id = Auth::user()->outlet_id;
        $item = $request->get('item');

        $qty = $request->get('qty');
        $product_id = $request->get('product_id');
        $amount = $request->get('amount');

        // $this->validate($request, [
        //     'customer_name' => 'string', 'max:255',
        //     'product_id' => 'required',
        //     'qty' => 'required',
        //     'amount' => 'required',
        //     'total' => 'required',
        // ]);
        
        $transaction = new Transaction();
        $transaction->cashier_id = $cashier_id;
        $transaction->total = $request->get('total');
        $transaction->receipt = "receipt";
        $transaction->outlet_id = $outlet_id;
        $transaction->customer_name = $request->get('customer_name');
        $transaction->save();

        for ($i=0; $i < $item; $i++) { 
            $detail = new TransactionDetail();
            $detail->product_id = $product_id[$i];
            $detail->qty = $qty[$i];
            $detail->amount = $amount[$i];
            $detail->transaction_id = $transaction->id;
            $detail->save();

            $product = ProductDetail::where('outlet_id',  $outlet_id)->where('product_id', $product_id[$i])->first();
            $product->stock -= $qty[$i];
            $product->save();
        }

        \Session::flash('success', 'Transaksi Berhasil');
        return redirect(route('cashier-transaction.index'));
    }

    public function print()
    {
        $pdf = PDF::loadview('cashier.transaction.print');
        return $pdf->stream('invoice.pdf');
        // $outlet = Auth::user()->outlet_id;
        // $produk = ProductDetail::where('outlet_id', $outlet)->orderBy('id', 'asc')->get();
        // return view('cashier.transaction.index',
        //     compact(
        //         'produk'
        //     )
        // );
    }
}
