<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

        if (!$user->profileAdm) {
            session(['name' => $user->name, 'username' => $user->username]);
            return view('panel.admin.home');
        }

        session(['image' => $user->profileAdm->image, 'name' => $user->name, 'username' => $user->username]);

        return view('panel.admin.home');
    }
}
