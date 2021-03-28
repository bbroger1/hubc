<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Socialite;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/login';

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
            $request->session()->regenerate();

            // User type
            $type = Auth::user()->type;

            // Check user type
            switch ($type) {
                case '1':
                    return $redirect
                        ->intended('/admin/home');
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
                    return $redirect
                        ->intended('/login');
                    break;
            }
        }

        throw ValidationException::withMessages([
            'message' => __('auth.failed')
        ]);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->scopes(['r_liteprofile', 'r_emailaddress'])->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect("/candidate/home");
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'type' => 3
        ]);
    }
}
