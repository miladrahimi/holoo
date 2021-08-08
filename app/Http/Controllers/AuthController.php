<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignIn(): View
    {
        return view('auth.sign-in');
    }

    public function postSignIn(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($request->only(['email', 'password']))) {
            return redirect()->route('contacts.index');
        }

        return back()->with('error', trans('auth.failed'));
    }
}
