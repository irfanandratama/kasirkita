<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Management;
use App\Models\Business;
use App\Models\Outlet;

class ManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $management = Management::paginate(10);
        return view('admin.management.index',
            compact(
                'management'
        ));
    }

    public function create()
    {
        $businesses = Business::all();
        return view('admin.management.create',
            compact(
                'businesses'
            ));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:admins',
            'business_id' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed'
        ]);

        $management = new Management();
        $management->name = $request->get('name');
        $management->email = $request->get('email');
        $management->business_id = $request->get('business_id');
        $management->phone = $request->get('phone');
        $management->password = Hash::make($request->get('password'));
        $management->save();
        
        \Session::flash('success', 'Berhasil Menambahkan Manajemen');
        return redirect(route('admin-management.index'));
    }

    public function detail($id)
    {
        $management = Management::where('id', $id)->first();
        $businesses = Business::all();
        return view('admin.management.detail',
            compact(
                'management',
                'businesses'
        ));
    }

    public function assignOutlet($id)
    {
        $management = Management::where('id', $id)->first();
        $businesses = Business::all();
        $outlet = Outlet::where('business_id', $management->business_id)->get();

        return view('admin.management.assign-outlet',
            compact(
                'management',
                'businesses',
                'outlet'
        ));
    }

    public function assignNew(Request $request, $id)
    {
        $management = Management::where('id', $id)->first();

        $this->validate($request, [
            'outlet_id' => 'required',
        ]);

        $management->outlet_id = $request->get('outlet_id');
        $management->save();

        \Session::flash('status', 'Data Berhasil Disimpan');
        return redirect(route('admin-management.index'));
    }
}
