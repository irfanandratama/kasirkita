<?php

namespace App\Http\Controllers\Management;

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
        $this->middleware('auth:management');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management.dashboard', ['page_title' => 'Dashboard']);
    }
    /**
     * redirect to dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return redirect(route('management.dashboard'));
    }
}