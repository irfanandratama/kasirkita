<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\BusinessType;
use App\Models\VisitLog;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $businessType = BusinessType::orderBy('name', 'asc')->get();

        $visit = new VisitLog();
        $visit->ip_address = $request->ip();
        $visit->save();

        return view('home.index',
            compact(
                'businessType'
            ));
    }
}
