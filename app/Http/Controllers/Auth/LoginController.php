<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request, Redirector $redirect)
    {
        $remember = $request->filled('remember_token');

        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            $request->session()
                ->regenerate();

            // User type
            $type = Auth::user()->type;

            // Check user type
            switch ($type) {
                case '1':
                    return $redirect
                        ->intended('home');
                    break;
                case '2':
                    return $redirect
                        ->intended('/employer/home');
                    break;
                case '3':
                    return $redirect
                        ->intended('/candidate/home');
                    break;
                default:
                    return '/login';
                    break;
            }
        }

        throw ValidationException::withMessages([
            'message' => __('auth.failed')
        ]);
    }
}
