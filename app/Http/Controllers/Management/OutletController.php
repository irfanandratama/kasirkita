<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Cashier;
use App\Models\ProductDetail;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Auth;

class OutletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:management');
    }

    public function index()
    {
        $bisnis = Auth::user()->business_id;
        $outlet = Outlet::where('business_id', $bisnis)->orderBy('name', 'asc')->get();
        return view('management.outlet.index',
            compact(
                'outlet'
            ));
    }

    public function create()
    {
        return view('management.outlet.create');
    }

    public function store(Request $request)
    {
        $bisnis = auth()->user()->business_id;

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'address' => 'required', 'string', 'max:255'
        ]);

        $outlet = new Outlet();
        $outlet->name = $request->get('name');
        $outlet->address = $request->get('address');
        $outlet->business_id = $bisnis;
        $outlet->save();

        \Session::flash('success', 'Berhasil Menambahkan Outlet');
        return redirect(route('management-outlet.index'));
    }

    public function delete($id)
    {
        $outlet = Outlet::where('id', $id)->first();

        if(!$outlet){
            \Session::flash('danger', 'Data tidak ditemukan');
            return redirect(route('management-category-product.index'));
        }

        $outlet->delete();

        \Session::flash('danger', 'Data Dihapus');
        return redirect(route('management-outlet.index'));
    }

    public function edit($id)
    {
        $outlet = Outlet::where('id', $id)->first();
        return view('management.outlet.edit',
            compact(
                'outlet'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $outlet = Outlet::where('id', $id)->first();

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'address' => 'required', 'string', 'max:255'
        ]);

        $outlet->name = $request->get('name');
        $outlet->address = $request->get('address');
        $outlet->save();

        \Session::flash('success', 'Data Berhasil Disimpan');
        return redirect(route('management-outlet.index'));
    }

    public function detail($id)
    {
        $outlet = Outlet::where('id', $id)->first();
        $cashier = Cashier::where('outlet_id', $id)->get();
        $product = Productdetail::where('outlet_id', $id)->get();

        $transaction = Transaction::where('outlet_id', $id)->paginate(6);

        return view('management.outlet.detail',
            compact(
                'outlet',
                'cashier',
                'product',
                'transaction'
            )
        );
    }
}
