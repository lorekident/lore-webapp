<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
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
            'child_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date|before:today',
            'school_name' => 'required|string|max:255',
            'year_level' => 'required|string|max:255',
            'allergies' => 'nullable|string|max:500',
            'guardian_name' => 'required|string|max:255',
            'guardian_phone' => 'required|phone',
            'guardian_email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_phone' => 'required|phone',
            'relationship' => 'required|string|max:255',
            'inspiration' => 'nullable|string|max:500',
            'previous_business' => 'nullable|string|max:500',
            'hobbies' => 'nullable|string|max:500',
            'business_idea' => 'nullable|string|max:1000',
            'favorite_subject' => 'nullable|string|max:255',
            'aspiration' => 'nullable|string|max:500',
            'guardian_consent' => 'required|accepted',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create(array_merge($data, [
            'name' => $data['child_name'],
            'password' => Hash::make($data['password'])
        ]));

        Profile::create(array_merge($data, [
            'user_id' => $user->id
        ]));

        return $user;
    }
}
