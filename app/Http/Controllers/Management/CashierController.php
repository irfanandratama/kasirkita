<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\Cashier;
use App\Models\Management;
use Auth;

class CashierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:management');
    }

    public function index()
    {
        $bisnis = Auth::user()->business_id;
        $cashier = Cashier::where('business_id', $bisnis)->get();

        return view('management.cashier.index',
            compact(
                'cashier'
        ));
    }

    public function create()
    {
        return view('management.cashier.create');
    }

    public function store(Request $request)
    {
        $business_id = auth()->user()->business_id;

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:cashiers',
            'password' => 'required', 'string', 'min:8',
        ]);

        $cashier = new Cashier();
        $cashier->name = $request->get('name');
        $cashier->email = $request->get('email');
        $cashier->business_id = $business_id;
        $cashier->password = Hash::make($request->get('password'));
        $cashier->save();

        \Session::flash('success', 'Berhasil Menambahkan Kasir');
        return redirect(route('management-cashier.index'));
    }

    public function delete($id)
    {
        $cashier = Cashier::where('id', $id)->first();

        if(!$cashier){
            \Session::flash('danger', 'Data tidak ditemukan');
            return redirect(route('user.index'));
        }

        $cashier->delete();

        \Session::flash('danger', 'Data Dihapus');
        return redirect(route('management-cashier.index'));
    }

    public function edit($id)
    {
        $cashier = Cashier::where('id', $id)->first();
        return view('management.cashier.edit',
            compact(
                'cashier'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $cashier = Cashier::where('id', $id)->first();

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255'
        ]);

        $cashier->name = $request->get('name');
        $cashier->email = $request->get('email');
        $cashier->save();

        \Session::flash('success', 'Data Berhasil Disimpan');
        return redirect(route('management-cashier.index'));
    }
}
