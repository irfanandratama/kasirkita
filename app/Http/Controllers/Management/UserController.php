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
}
