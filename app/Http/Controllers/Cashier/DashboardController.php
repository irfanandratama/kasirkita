<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:cashier');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cashier.dashboard', ['page_title' => 'Dashboard']);
    }
    /**
     * redirect to dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return redirect(route('cashier.dashboard'));
    }
}