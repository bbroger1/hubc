<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->type != 1) {
            return view('auth.login')->with('error', 'Faça login como Admin para acessar essa página.');
        }

        $user = User::join('profile_adms', 'profile_adms.users_id', '=', 'users.id')
            ->select(
                'users.name',
                'users.username',
                'profile_adms.image',
            )->get(Auth::user()->id)->first();

        session(['image' => $user->image, 'name' => $user->name, 'username' => $user->username]);

        return view('panel.admin.home');
    }
}
