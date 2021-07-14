<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Business;
use App\Models\Outlet;

class BarberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $barber = Barber::paginate(10);
        return view('admin.barber.index',
            compact(
                'barber'
        ));
    }

    public function detail($id)
    {
        $barber = Barber::where('id', $id)->first();
        $outlets = Outlet::all();
        $businesses = Business::all();
        return view('admin.barber.detail',
            compact(
                'barber',
                'outlets',
                'businesses'
        ));
    }
}
