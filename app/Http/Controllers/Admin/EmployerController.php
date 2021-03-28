<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
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
        if (!Auth::user()->isAdmin()) {
            return view('auth.login')
                ->with('warning', 'Faça login como Admin para acessar essa página.');
        }

        $employers = User::where('type', 2)->paginate();

        return view('panel.admin.home', compact('employers'));
    }
}
