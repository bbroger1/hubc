<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterEmployerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterEmployerController extends Controller
{
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(RegisterEmployerRequest $data)
    {
        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'representative_name' => $data['representative_name'],
            'type' => 2
        ]);
        return redirect(route('login'));
    }

    protected function employer()
    {
        return view('auth.register-employer');
    }
}
