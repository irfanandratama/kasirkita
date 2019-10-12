<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use App\Models\BusinessType;
use App\Models\Management;
use App\Models\Business;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function registerManagement(Request $request){

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'phone' => 'required', 'numeric',
            'password' => 'required', 'string', 'min:8',
            'businessName' => 'required', 'string', 'max:255',
            'business_type_id' => 'required',
        ]);

        $businessType = BusinessType::orderBy('name', 'asc')->get();
      
        $business = new Business();
        $business->name = $request->get('businessName');
        $business->business_type_id = $request->get('business_type_id');
        $business->save();
      
      
        $manejemen = new Management();
        $manejemen->name = $request->get('name');
        $manejemen->email = $request->get('email');
        $manejemen->phone = $request->get('phone');
        $manejemen->business_id = $business->id;
        $manejemen->password = Hash::make($request->get('password'));
        $manejemen->save();

        \Session::flash('notif-success', 'Berhasil Membuat Akun, Silahkan Login Sebagai Owner!');
        return redirect('/');
    }
}
