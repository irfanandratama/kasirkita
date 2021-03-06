<?php

namespace App\Http\Controllers\Cashier\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Cashier\Requests\CashierAccountInfoRequest;
use App\Http\Controllers\Cashier\Requests\CashierChangePasswordRequest;
use \Prologue\Alerts\Facades\Alert;
use App\Http\Controllers\Cashier\Controller;
use Illuminate\Support\Facades\Hash;


class CashierAccountController extends Controller
{

    protected $data = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:cashier');
    }


    public function showAccountInfoForm() {

        $this->data['page_title'] = 'Cashier Account';
        $this->data['user'] = $this->guard()->user();

        return view('cashier.auth.account.update_info', $this->data);
    }

    public function accountInfoForm(CashierAccountInfoRequest $request)
    {
        $result = $this->guard()->user()->update($request->except(['_token']));
        if ($result) {
            Alert::success('Account Info Updated')->flash();
        } else {
            Alert::error('Failed To Update Account Info')->flash();
        }
        return redirect()->back();
    }

    public function showChangePasswordForm()
    {
        $this->data['page_title'] = 'Cashier Account';
        $this->data['user'] = $this->guard()->user();

        return view('cashier.auth.account.change_password', $this->data);
    }

    public function changePasswordForm(CashierChangePasswordRequest $request)
    {
        $user = $this->guard()->user();
        $user->password = Hash::make($request->new_password);
        if ($user->save()) {
            Alert::success('Account Info Updated')->flash();
        } else {
            Alert::error('Failed To Update Account Info')->flash();
        }
        return redirect()->back();
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('cashier');
    }
}