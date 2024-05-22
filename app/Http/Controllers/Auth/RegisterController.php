<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required', 'string', 'max:10','in:Patient,Doctor,Counselor'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'pp_location' => $data['pp_location'],
            'pp_name' => $data['pp_name'],
            'is_active' => $data['is_active'],
            'terms' => $data['terms'],

        ]);
    }

    public function register(Request $request)
    {

        $this->validator($request->all())->validate();
        $request->merge(['pp_location' => 'images/avatar', 'pp_name' => 'blank-profile-picture.png','is_active' => 1,'terms' => 0,]);
        // $request->merge(['is_active' => 1,]);
        event(new Registered($user = $this->create($request->except('role'))));
        $user->assignRole($request->role); #==============================assigning role

        $this->guard()->login($user);


        // ==============================================================redirect page condition will be here.
        if($user->hasRole('Patient')){
            // return view('patient.profile');
            return redirect()->route('patient.profile');
        }elseif($user->hasRole('Counselor')){
            // return view('counselor.dashboard');
            return redirect()->route('counselor.dashboard');
        }elseif($user->hasRole('Doctor')){
            return redirect()->route('doctor.dashboard');
        }



        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }
}
