<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Business;
use App\Models\Admin;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard', ['page_title' => 'Dashboard']);
    }
    /**
     * redirect to dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return redirect(route('admin.dashboard'));
    }

    

    
}