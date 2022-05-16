<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // login view
    public function login()
    {
        return view('auth.login');
    }
    // check login info against database
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (auth()->user()->is_admin === User::IS_ADMIN) {

                return redirect()->route('dashboard');
                Alert::success('Login Success', 'You have Login Successfully');
            }
            return redirect()->route('login');
        }

        return redirect()->route("login");
    }

    // registration view
    public function register()
    {
        return view('auth.register');
    }
    // validate user input from form
    public function validateUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Alert::info('Important', 'Only admin can register user');
        return redirect()->route("register");
    }

    // logout user and destroy session
    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Logout Success', 'You have Logout Successfully');

        return Redirect('login');
    }
}