<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        if (Auth::check()) {
            if (Auth::user()->isSuperAdmin()) {
                return redirect(route('superAdmin.dashboard'));
            }
            if (Auth::user()->isAdmin()) {
                return redirect(route('admin.dashboard'));
            }
            if (Auth::user()->isDataEntryOperator()) {
                return redirect(route('dataEntry.dashboard'));
            }
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $authUser = Auth::user();

            if ($authUser->isSuperAdmin()) {
                return redirect(route('superAdmin.dashboard'));
            }
            if ($authUser->isAdmin()) {
                return redirect(route('admin.dashboard'));
            }
            if ($authUser->isDataEntryOperator()) {
                return redirect(route('dataEntry.dashboard'));
            } else {
                Auth::logout();

                return back()->with('error', 'Credentials Not Match');
            }
        } else {
            Auth::logout();

            return back()->with('error', 'Record not found');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('login.view'));
    }
}
