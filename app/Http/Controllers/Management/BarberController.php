<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\Cashier;
use App\Models\Management;
use App\Models\Outlet;
use App\Models\Barber;
use Auth;

class BarberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:management');
    }

    public function index()
    {
        $bisnis = Auth::user()->business_id;
        $barber = Barber::where('business_id', $bisnis)->get();

        return view('management.barber.index',
            compact(
                'barber'
        ));
    }

    public function create()
    {
        $bisnis = Auth::user()->business_id;
        $outlet = Outlet::where('business_id', $bisnis)->get();
        return view('management.barber.create',
            compact(
                'outlet'
            ));
    }

    public function store(Request $request)
    {
        $business_id = auth()->user()->business_id;

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:barbers',
            'password' => 'required|confirmed', 'string',
        ]);

        $barber = new Barber();
        $barber->name = $request->get('name');
        $barber->email = $request->get('email');
        $barber->outlet_id = $request->get('outlet');
        $barber->business_id = $business_id;
        $barber->password = Hash::make($request->get('password'));
        $barber->save();

        \Session::flash('success', 'Berhasil Menambahkan Tukang Cukur');
        return redirect(route('management-barber.index'));
    }

    public function delete($id)
    {
        $barber = Barber::where('id', $id)->first();

        if(!$barber){
            \Session::flash('danger', 'Data tidak ditemukan');
            return redirect(route('management-barber.index'));
        }

        $barber->delete();

        \Session::flash('danger', 'Data Dihapus');
        return redirect(route('management-barber.index'));
    }

    public function edit($id)
    {
        $bisnis = auth()->user()->business_id;
        $barber = Barber::where('id', $id)->first();
        $outlet = Outlet::where('business_id', $bisnis)->get();
        return view('management.barber.edit',
            compact(
                'barber',
                'outlet'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $barber = Barber::where('id', $id)->first();

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255'
        ]);

        $barber->name = $request->get('name');
        $barber->email = $request->get('email');
        $barber->save();

        \Session::flash('success', 'Data Berhasil Disimpan');
        return redirect(route('management-barber.index'));
    }
}
