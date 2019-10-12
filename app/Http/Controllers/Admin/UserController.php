<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Management;
use App\Models\Admin;
use App\Models\BusinessType;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function profile()
    {
        $page_title = "Profile";

        return view('admin.profile.edit',
            compact(
                'page_title',
        ));
    }

    public function editProfile(Request $request, $id)
    {
        $admins = Admin::where('id', $id)->first();

        if(!$admins){
            \Session::flash('status', 'Data tidak ditemukan');
            return redirect(route('profil'));
        }

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:admins',
        ]);

        $admins->name = $request->get('name');
        $admins->email = $request->get('email');
        $admins->save();

        \Session::flash('status', 'Data Berhasil Disimpan');
        return redirect(route('profile'));
    }

    public function index()
    {
        $page_title = "User List";

        $management = Management::orderBy('name', 'asc')->get();

        return view('admin.users.index',
            compact(
                'page_title',
                'management',
        ));
    }

    public function create()
    {
        $businessType = BusinessType::get();

        return view('admin.users.create',
            compact(
                'businessType',
        ));
    }

    public function delete($id)
    {
        $user = Manejeman::where('id', $id)->first();

        if(!$user){
            \Session::flash('status', 'Data tidak ditemukan');
            return redirect(route('user.index'));
        }

        $user->delete();

        \Session::flash('status', 'Data Berhasil Dihapus');
        return redirect(route('user.index'));
    }
}
