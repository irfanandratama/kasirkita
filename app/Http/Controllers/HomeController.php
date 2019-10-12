<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\BusinessType;

class HomeController extends Controller
{
    public function index(Request $request){

        $businessType = BusinessType::orderBy('name', 'asc')->get();

        return view('home.index',
            compact(
                'businessType',
            ));
    }
}
