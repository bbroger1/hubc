<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        if (Auth::user()->id != $id) {
            abort(404);
        }

        $profiles = User::findorfail($id);

        return view('panel.admin.home', compact('profiles'));
    }
}
