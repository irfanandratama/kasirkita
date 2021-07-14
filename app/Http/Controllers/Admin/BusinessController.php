<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessType;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $business = Business::paginate(10);
        return view('admin.business.index',
            compact(
                'business'
        ));
    }

    public function detail($id)
    {
        $business = Business::where('id', $id)->first();
        $businessTypes = BusinessType::all();
        return view('admin.business.detail',
            compact(
                'business',
                'businessTypes'
        ));
    }
}
