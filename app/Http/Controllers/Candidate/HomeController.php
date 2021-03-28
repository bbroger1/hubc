<?php

namespace App\Http\Controllers\Candidate;

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
        if (Auth::user()->type != 3) {
            return view('auth.login');
        }

        $user = User::find(Auth::user()->id);

        if (!$user->profileCandidate) {
            session(['name' => $user->name, 'username' => $user->username]);
            return view('panel.candidate.candidateHome');
        }

        session(['image' => $user->profileCandidate->image, 'name' => $user->name, 'username' => $user->username]);

        return view('panel.candidate.candidateHome');
    }
}
