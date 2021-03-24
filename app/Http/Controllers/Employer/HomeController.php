<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->type != 2) {
            return view('auth.login');
        }

        $user = User::join('profile_adms', 'profile_adms.users_id', '=', 'users.id')
            ->select(
                'users.name',
                'users.username',
                'profile_adms.image',
            )->where('users.id', Auth::user()->id)
            ->get()
            ->first();
        if (!$user) {
            $user = User::where('id',  Auth::user()->id)
                ->select('users.name', 'users.username',)
                ->get()
                ->first();
            session(['name' => $user->name, 'username' => $user->username]);
            return view('panel.employer.employerHome');
        }

        session(['image' => $user->image, 'name' => $user->name, 'username' => $user->username]);

        return view('panel.employer.employerHome');
    }
}
