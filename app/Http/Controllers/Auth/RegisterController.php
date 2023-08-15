<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    // over ride functions 

    public function showRegistrationForm()
    {
        $organization_types = OrganizationType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('auth.register', compact('organization_types'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Get all available organization type IDs from the OrganizationType model
        $availableOrg_Types = OrganizationType::pluck('id')->toArray();

        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'organization_name' => 'required|string|max:255',
            'organization_type_id' => 'required|in:' . implode(',', $availableOrg_Types),
            'website' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'organization_mobile_number' => 'nullable|string|max:255',
            'position' => 'required|max:50',
            'mobile_number' => 'required'
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

        // create Organization user 
        $organization_user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'position' => $data['position'],
            'user_type' => 'organization',
            'mobile_number' => $data['mobile_number'],
        ]);

        // create Organization  
        Organization::create([
            'name' => $data['organization_name'],
            'website' => $data['website'],
            'mobile_number' => $data['organization_mobile_number'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'organization_type_id' => $data['organization_type_id'],
            'user_id' => $organization_user->id,
        ]);
        return $organization_user;
    }
}
