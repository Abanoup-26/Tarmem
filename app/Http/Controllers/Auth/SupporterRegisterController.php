<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Supporter;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SupporterRegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // override functions 
    public function showRegistrationForm()
    {
        return view('auth.supporter-register');
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
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'mobile_number' => ['required' ,'numeric' , 'min:12' ] ,
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     ** @return \App\Models\User
     */
    protected function create(array $data)
    {   

        $supporterUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'approved' => false,
            'user_type' => 'supporter',
            'mobile_number' => $data['mobile_number'],
        ]);

        Supporter::create([
            'user_id' => $supporterUser->id 
        ]);

        return  $supporterUser ; 
    }
}

