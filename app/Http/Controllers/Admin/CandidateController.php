<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
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
        $type = Auth::user()->type;

        if ($type != 1) {
            return view('auth.login')->with('error', 'Faça login como Admin para acessar essa página.');
        }

        $candidates = User::where('type', 3)->paginate();

        return view('panel.admin.home', compact('candidates'));
    }
}
