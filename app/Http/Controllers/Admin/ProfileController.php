<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
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

        $profile = User::findorfail($id);
        return view('panel.admin.home', compact('profile'));
    }

    public function editPersonal(ProfileRequest $request)
    {
        dd($request);
    }
}
