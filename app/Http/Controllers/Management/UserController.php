<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\Cashier;
use App\Models\Management;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:management');
    }

    public function profile()
    {
        return view('management.profile.edit');
    }

    public function editProfile(Request $request, $id)
    {
        $management = Management::where('id', $id)->first();

        if(!$management){
            \Session::flash('status', 'Data tidak ditemukan');
            return redirect(route('profil'));
        }

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:admins',
        ]);

        $management->name = $request->get('name');
        $management->email = $request->get('email');
        $management->save();

        \Session::flash('status', 'Data Berhasil Disimpan');
        return redirect(route('management.profile'));
    }

    public function index()
    {

        $cashier = Cashier::orderBy('name', 'asc')->get();

        return view('management.cashier.index',
            compact(
                'cashier',
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

        \Session::flash('status', 'Berhasil Menambahkan Kasir');
        return redirect(route('management-cashier.index'));
    }

    public function delete($id)
    {
        $cashier = Cashier::where('id', $id)->first();

        if(!$cashier){
            \Session::flash('status', 'Data tidak ditemukan');
            return redirect(route('user.index'));
        }

        $cashier->delete();

        \Session::flash('status', 'Data Berhasil Dihapus');
        return redirect(route('management-cashier.index'));
    }
}
