<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\Outlet;
use App\Models\Cashier;
use App\Models\Transaction;
use App\Models\VisitLog;
use App\Models\Barber;
use stdClass;
use PDF;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:cashier');
    }

    public function index()
    {

        return view('cashier.transaction.index',
            compact(
                'produk'
            )
        );
    }

    public function data(Request $request){
        $outlet = Auth::user()->outlet_id;
        $keyword = ($request->has('q')) ? $request->q : '';
        $produk = Product::where('name','like',"%$keyword%")
            ->with('category')
            ->whereHas('productDetail',  function (Builder $query) use ($outlet) {
                $query->where('outlet_id',  $outlet);
            })->orderBy('id', 'asc')->with(['productDetail' => function ($query) use ($outlet) {
                $query->where('outlet_id', $outlet);
            }])->get();
        return $produk;
    }

    public function invoice(Request $request)
    {
        $item = $request->get('item');
        $qty = $request->get('qty');
        $product_id =$request->get('product');
        $outlet = Auth::user()->outlet_id;
        $barber = Barber::where('outlet_id', $outlet)->get();
        $today = Carbon::today()->format('Y-m-d');
        $todayTransaction = Transaction::where('outlet_id', $outlet)->whereDate('created_at', $today)->count();

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
                'item',
                'barber',
                'todayTransaction'
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

        $today = Carbon::today()->format('Ymd');
        $todayTransaction = Transaction::where('outlet_id', $outlet_id)->whereDate('created_at', $today)->count();

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
        $transaction->barber_id = $request->get('barber');
        $transaction->code = $today . '-' . ($todayTransaction + 1);
        $transaction->save();

        for ($i=0; $i < $item; $i++) {
            $detail = new TransactionDetail();
            $detail->product_id = $product_id[$i];
            $detail->qty = $qty[$i];
            $detail->amount = $amount[$i];
            $detail->transaction_id = $transaction->id;
            $detail->save();
            
            $product = Product::find($product_id[$i]);
            if ($product->category->name !== 'Jasa' && $product->category->name !== 'Layanan' && $product->category->name !== 'Service') {
                $product_detail = ProductDetail::where('outlet_id',  $outlet_id)->where('product_id', $product_id[$i])->first();
                $product_detail->stock -= $qty[$i];
                $product_detail->save();
            }
        }

        $run = true;

        if ($run === true) {  // Depends on what "createUser" returns
            return $this->print($request); // Might not be "$this"
        }

        \Session::flash('success', 'Transaksi Berhasil');
        return redirect(route('cashier-transaction.index'));
    }

    public function print(Request $request)
    {
        $item = $request->get('item');
        $cashier_id = Auth::user()->id;
        $outlet_id = Auth::user()->outlet_id;
        $product_id = $request->get('product_id');

        $outlet = Outlet::where('id', $outlet_id)->first();
        $qty = $request->get('qty');
        $cashier = Cashier::where('id', $cashier_id)->first();
        $total = $request->get('total');

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

        $pdf = PDF::loadview('cashier.transaction.print',
            compact(
                'products',
                'cashier',
                'outlet',
                'total'
            )
        )->setPaper('A8', 'portrait');
        \Session::flash('success', 'Transaksi Berhasil');
        return $pdf->download('invoice.pdf');
        sleep(3);
        return redirect(route('cashier-transaction.index'));

    }
}
