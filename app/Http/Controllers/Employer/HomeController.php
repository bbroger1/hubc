<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        if (!$user->profileEmployer) {
            session(['name' => $user->name, 'username' => $user->username]);
            return view('panel.employer.employerHome');
        }

        session(['image' => $user->profileEmployer->image, 'name' => $user->name, 'username' => $user->username]);

        return view('panel.employer.employerHome');
    }
}
