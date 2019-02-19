<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['required', 'string', 'max:100'],
            'maiden_name' => ['max:100'],
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'contact_number' => ['required', 'string', 'digits:11'],
            'street' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'postal_code' => ['required', 'string', 'max:20'],
            'status' => ['string', 'max:20'],
            'marital_status' => ['required', 'string', 'max:20'],
            'profile_picture' => ['max:255'],
            'terms' => ['required', 'accepted'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'maiden_name' => $data['maiden_name'],
            'birth_date' => date('Y-m-d', strtotime($data['birth_date'])),
            'accepted_terms_at' => date('Y-m-d'),
            'accepted_privacy_at' => date('Y-m-d'),
            'contact_number' => $data['contact_number'],
            'street' => $data['street'],
            'city' => $data['city'],
            'country' => $data['country'],
            'postal_code' => $data['postal_code'],
            'status' => 'Active',
            'marital_status' => $data['marital_status'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
