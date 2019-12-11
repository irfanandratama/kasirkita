<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management;

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

    public function detail($id)
    {
        $management = Management::where('id', $id)->first();
        return view('admin.management.detail',
            compact(
                'management'
        ));
    }
}
